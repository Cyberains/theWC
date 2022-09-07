<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Membership;
use App\Models\GSTRate;
use App\Models\ReturnItems;
use App\Models\OfflineBilling;
use App\Models\ProductExpiry;
use PDF;
use Auth;
use App\Models\Role;
use DateTime;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use DB;
use App\Models\GarbageItem;
class ReturnItemController extends Controller
{

   public function create(){

     $membershipdata = Membership::get();
     $customerdata = User::where('role','user')->where('mobile_status',1)->get();
     $customerdata = User::where('role','user')->get();
     return view('admin.billing.returnitems',compact(['customerdata','membershipdata']));
   }

   //ajax call function
   public function GetUser(Request $request){
    $userdata = OfflineBilling::where('receipt_id','LIKE','%'.$request->search.'%')->get();

    if ($userdata->count()>0) {

      return response()->json([

        'status'=>1,
        'userdata'=>$userdata

      ]); 

    }else{

      return response()->json([

        'status'=>0

      ]);

    }
  }

  public function checkbilldetails(Request $request){

    $userdata = OfflineBilling::where('receipt_id','LIKE','%'.$request->id.'%')->pluck('receipt_id');

    if ($userdata->count()>0) {

      return response()->json([

        'status'=>1,
        'userdata'=>$userdata

      ]); 

    }else{

      return response()->json([

        'status'=>0

      ]);

    }
  }

  public function billingsearch(Request $request){

    $billingdata = OfflineBilling::where('receipt_id',$request->id)->whereJsonContains('barcode',$request->barcode)->first();

    if($billingdata){
      return response()->json([

        'status'=>1,
        'billingdata'=>$billingdata

      ]); 

    }else{
      return response()->json([

        'status'=>0

      ]); 
    }

  }

  
  public function addReturnitem(Request $request){

    $data=$request->all();
    $billingdata = OfflineBilling::where('receipt_id',$request->receipt_id)->whereJsonContains('barcode',$request->barcode)->first();
    $old_grandtotal=$billingdata->grand_total;
    $garbage=[];
    $qty='';

    $barcode=$data['barcode'];
    $returnqty=[];
    
    $weight=json_decode($billingdata->weight);
    $unit_tax=json_decode($billingdata->unit_tax);
    $unit_gst=json_decode($billingdata->unit_gst);
    $unit_other=json_decode($billingdata->unit_others);
    $hsn_sac=json_decode($billingdata->hsn_sac);

    $weights=[];
    $unit_checks=[];
    $unit_taxs=[];
    $unit_gsts=[];
    $hsn_sacs=[];
    $unit_others=[];

    foreach ($barcode as $key => $value) {

     if(!empty($weight)){

      $weights[]=$weight[$key];

      }else{

        $weights[]=null;
      }
      if(!empty($unit_check)){
        $unit_checks[]=$unit_check[$key];
      }else{
        $unit_checks[]=null;
      }
      
      if(!empty($unit_tax)){
        $unit_taxs[]=$unit_tax[$key];
      }else{
        $unit_taxs[]=null;
      }
      if(!empty($unit_gst)){
        $unit_gsts[]=$unit_gst[$key];
      }else{
        $unit_gsts[]=null;
      }
      if(!empty($hsn_sac)){
        $hsn_sacs[]=$hsn_sac[$key];
      }else{
        $hsn_sacs[]=null;
      }
      if(!empty($unit_other)){
        $unit_others[]=$unit_other[$key];
      }else{
        $unit_others[]=null;
      }

      $garbage_qty=$data['garbage_qty'][$key];

      if(!empty($garbage_qty)){
        $returnqty[]=$data['quantity'][$key]-$garbage_qty;
        $garbage[]=$garbage_qty;
      }else{
        $returnqty[]=$data['quantity'][$key];
      }
    }

    //insert data Return items table
    $credit_id = 'CN'.strtotime(now());
    $retutrn_receipt_id = 'REB'.strtotime(now());
    $form_data = [

      'biller_id'=>Auth::user()->id,
      'credit_id'=>$credit_id,
      'receipt_id'=>$request->receipt_id,
      'retutrn_receipt_id'=>$retutrn_receipt_id,
      'barcode'=>json_encode($data['barcode']),
      'product_name'=>json_encode($data['product_name']),
      'mrp_price'=>json_encode($data['mrp_price']),
      'price'=>json_encode($data['price']),
      'discount'=>json_encode($data['discount']),
      'expiry_date'=>json_encode($data['expiry_date']),
      'returnqty'=>json_encode($data['quantity']),
      'tax'=>json_encode($data['tax']),
      'amount'=>json_encode($data['amount']),
      'subtotal'=>$data['sub_total'],
      'total_tax'=>$request->total_tax,
      'grand_total'=>$request->grand_total,
      'credit_note_rupees'=>$request->grand_total,
      'weight'=>json_encode($weights),
      'unit_check'=>json_encode($unit_checks),
      'unit_tax'=>json_encode($unit_taxs),
      'unit_gst'=>json_encode($unit_gsts),
      'unit_others'=>json_encode($unit_others),
      'hsn_sac'=>json_encode($hsn_sacs),

    ];

    $returnItems=ReturnItems::create($form_data);
          //Updata Quantity atrributes table

    if(count($returnqty)>0){
      foreach ($barcode as $key => $value) {
        $attribute=ProductAttribute::where(['mrp_price'=>$data['mrp_price'][$key],'barcode_id'=>$data['barcode'][$key]])->first();
        $productexp=ProductExpiry::where(['product_id'=>$attribute->product_id,'productattr_id'=>$attribute->id])->first();
        $qty=floatval($productexp['quantity']+$returnqty[$key]);

        ProductExpiry::where(['product_id'=>$attribute->product_id,'productattr_id'=>$attribute->id])->update(['quantity'=>$qty]);


      } 
    }
    
    //check garbage or Not
    if(!empty($garbage)){

     foreach ($barcode as $key => $value) {

      $attribute=ProductAttribute::where(['mrp_price'=>$data['mrp_price'][$key],'barcode_id'=>$data['barcode'][$key]])->first();
      $productexp=ProductExpiry::where(['product_id'=>$attribute->product_id,'productattr_id'=>$attribute->id])->first();

      $form_data = [
        'barcode'=>$data['barcode'][$key],
        'product_name'=>$data['product_name'][$key],
        'mrp_price'=>$data['mrp_price'][$key],
        'discount'=>$data['discount'][$key],
        'expiry_date'=>$data['expiry_date'][$key],
        'qty'=>json_encode($garbage),
        'tax'=>$data['tax'][$key],

        'price'=>$data['price'][$key],

      ];
      GarbageItem::insert($form_data);

    } 
  }


  Session::flash('returnbill_id',$returnItems->id);

  return redirect()->back()->with('message','Return item success update !');

  }

  public function returnbillgenerate($id){

    $billingupdatedata=ReturnItems::where('id',$id)->first();
    
    $total_quantity = 0;

    if ($billingupdatedata) {
        
        $billingdata = ReturnItems::with('receiptName')->find($id);

        for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++){

            if (json_decode($billingdata->unit_check)[$i]=='nos') {
                
                $total_quantity= $total_quantity+intval(json_decode($billingdata->returnqty)[$i]);

            }
            else{

                $total_quantity= $total_quantity+1;

            }
            

        }

    }

    $size = array(0,0,700,205.9447);

    $pdf = PDF::loadView('admin.billing.returnbillingslip',['totalqty'=>$total_quantity,'billingdata'=>$billingdata])->setPaper($size, 'landscape');

    return $pdf->stream($billingdata->receiptName->name);

  }

  public function checkCreditNote(Request $request){

        $cndata = ReturnItems::where('credit_id',$request->cn_number)->first();

        if ($cndata != null) {
            
            if ($cndata->credit_note_status==0) {
                
                return response()->json([

                    'status'=>1,
                    'cndata_rupees'=>$cndata->credit_note_rupees

                ]);
            }
            else{

                return response()->json([

                    'status'=>0,
                    'message'=>'This Credit Note Already Used.'
                ]);

            }
        }
        else{

                return response()->json([

                    'status'=>0,
                    'message'=>'Invalid Credit Note'
                ]);
        }

    }

    public function applyCreditNote(){



    }

}
