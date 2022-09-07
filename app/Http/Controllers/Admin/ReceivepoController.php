<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receivepo;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\GSTRate;
use App\Models\ProductExpiry;
use Session;
use DB;

class ReceivepoController extends Controller
{
 
    public function index($id=null){

        $supplier=Supplier::with('suppliersname')->get();
        $receivepodata = Receivepo::paginate(25); 
        $currentpage = $receivepodata->currentPage();
        return view('admin.vendor.receivepo_view',compact(['receivepodata','id','currentpage','supplier']));

    }
      
    public function addReceive(Request $request,$id=null){

      if ($request->isMethod('get')) {
        
        $purchasedata=Purchase::find($id);
        $gst=GSTRate::get();
        $productlist=Product::get(); 
        //$purchasedatas=Purchase::where('id',$id)->get();
        $Lrno = Receivepo::orderBy('id','desc')->first();
        
        if ($Lrno != null) {
        
          $lrnumber =  $Lrno->lrnumber;
          $lrnumberg = explode("EBGRN",$lrnumber)[1];
          
          $counter = str_pad((int)$lrnumberg+1,3  ,"0",STR_PAD_LEFT);
          
          $lrnumberg = "EBGRN".$counter;

        }
        else{
        
          $lrnumberg = 'EBGRN0001';
          
        }

        return view('admin.vendor.add_receivepo',compact('purchasedata','lrnumberg','gst','productlist'));

      }

      if($request->isMethod('post')){
       
        $data=$request->all();

        //mrp price
        $mrp=$data['mrp'];        
        $basic_price=$data['buyprice'];

        //product
        $productname=$data['productname'];
        $expdate=$data['expdate'];
        $qty=$data['receivedqty'];
        $barcode_id=$data['barcode_id'];
        $tax=$data['tax'];
        $credit=[]; 
        $debit=[];

        foreach($data['qty'] as $key => $q){

            if($q>$data['receivedqty'][$key]){
           
             $debit[$key]=$data['buyprice'][$key]+$data['buyprice'][$key]*$data['tax'][$key]/100*$data['returnquantity'][$key];

            }

            if($q<$data['receivedqty'][$key]){

              $credit[$key]=$data['buyprice'][$key]+$data['buyprice'][$key]*$data['tax'][$key]/100*$data['receivedqty'][$key];
            }
       
        }

       //echo json_encode($credit);die;
       //dd($debit,$credit);
        getproductgrnid($productname,$expdate,$qty,$mrp,$basic_price,$barcode_id,$tax);
        
        $form_data = [
        
        'lrnumber'=>$request->lrnumber,
        'purchase_id'=>$id,
        'poreference'=>$request->poreference,
        'suppplierid'=>$request->suppplierid,
        'supppliername'=>$request->supppliername,
        'carriername'=>$request->carriername,
        'barcode_id'=>json_encode($data['barcode_id']),
        'expected_date'=>$request->expected_date,
        //'scansku'=>$request->scansku,
        'remaindermail'=>$request->remaindermail,
        'invoicevalue'=>$request->invoicevalue,
        'invoicenumber'=>$request->invoicenumber,
        //'discountvalue'=>$request->discountvalue,
        //'remark'=>$request->remark,
        'skucode'=>json_encode($data['skucode']),
        'productname'=>json_encode($data['productname']),
        'mrp'=>json_encode($data['mrp']),
        'qty'=>json_encode($data['qty']),
        'receivedqty'=>json_encode($data['receivedqty']),
        'unitprice'=>json_encode($data['unitprice']),
        'buyprice'=>json_encode($data['buyprice']),
        //'discount'=>json_encode($data['discount']),
        'mfgdata'=>json_encode($data['mfgdata']),
        'expdate'=>json_encode($data['expdate']),
        'tax'=>json_encode($data['tax']),
        'cess'=>json_encode($data['cess']),
        'apmc'=>json_encode($data['apmc']),
        'returnquantity'=>json_encode($data['returnquantity']),
        'total'=>json_encode($data['total']),
        'sub_total'=>$request->sub_total,
        'total_tax'=>$request->total_tax,
        'grand_total'=>$request->grand_total,
        'tax_price'=>json_encode($data['hiddenttax']),
        'credit'=>json_encode($credit),
        'debit'=>json_encode($debit),
        'purchase_amount'=>$purchasedata->amount,
        'purchage_grand_total'=>$purchasedata->grand_total,
        ];
        
        $insert=Receivepo::create($form_data);


        //update credit or debit in to supplier

        $supplier=Supplier::with('suppliersname')->where('supplier_id',$request->suppplierid)->first();

        $price=0;
        $purchaseprice=0;

         foreach($supplier->suppliersname as $count){

          $price=$price+$count->grand_total;
          $purchaseprice=$purchaseprice+$count->purchage_grand_total;

         }
      
          $creditordebit=$price-$purchaseprice;
          
          if($creditordebit > 0){
              $crd='credit-'.$creditordebit;
          
          }
          elseif($creditordebit < 0){
          
             $crd='debit-'.substr($creditordebit, 1);
          } 

        Supplier::where('supplier_id',$request->suppplierid)->update(['balance'=>$crd]);
        //$purchasedata = Receivepo::create($form_data);
        Session::flash('message', 'Receivepo saved successfully.');
        return redirect()->route('admin.receivepo');
        
      }
      
    }

    public function skuSearch(Request $request){

      $productdata = Product::with('productAttribute')->Where('product_code','LIKE','%'.$request->productsku_val.'%')->get();
      
      
      if ($productdata->count()>0) {
      
        return response()->json([
        
        'status'=>1,
        'productdata' => $productdata,
        
        ]);
      
      }
      else{
      
        return response()->json([
        
        'status'=>0,
        
        
        ]);
      }      
      
    }

    public function skuProduct(Request $request){
      
      $productdata = Product::with('productAttribute')->Where('product_code',$request->skuname)->first();
            
      if ($productdata->count()>0) {
      
        return response()->json([
        
          'status'=>1,
          'productdata' => $productdata,
        
        ]);
      
      }
      else{
      
        return response()->json([
        
        'status'=>0,
        
        
        ]);
      }
      
    }

    public function edit(Request $request,$id){

      $purchasedata=Receivepo::find($id);
      $gst=GSTRate::get();
      $productlist=Product::get();

      if($request->isMethod('post')){

        $data=$request->all();         
        $mrp=$data['mrp'];
        
        $basic_price=$data['buyprice'];
    
        //product
        $productname=$data['productname'];
        $expdate=$data['expdate'];
        $qty=$data['receivedqty'];
        $barcode_id=$data['barcode_id'];
        $tax=$data['tax'];
    
        $credit=[]; 
        $debit=[];

        foreach($data['qty'] as $key => $q){

          if($q>$data['receivedqty'][$key]){
         
            $debit[]=$data['buyprice'][$key]+$data['buyprice'][$key]*$data['tax'][$key]/100*$data['returnquantity'][$key];
          }

          if($q<$data['receivedqty'][$key]){

            $credit[]=$data['buyprice'][$key]+$data['buyprice'][$key]*$data['tax'][$key]/100*$data['receivedqty'][$key];

          }
     
        }

        getproductgrnid($productname,$expdate,$qty,$mrp,$basic_price,$barcode_id,$tax);

        $form_data =  [
        
          'lrnumber'=>$request->lrnumber,
          'poreference'=>$request->poreference,
          'suppplierid'=>$request->suppplierid,
          'barcode_id'=>json_encode($data['barcode_id']),
          'supppliername'=>$request->supppliername,
          'carriername'=>$request->carriername,
          'expected_date'=>$request->expected_date,
          'scansku'=>$request->scansku,
          'remaindermail'=>$request->remaindermail,
          'invoicevalue'=>$request->invoicevalue,
          'invoicenumber'=>$request->invoicenumber,
          'discountvalue'=>$request->discountvalue,
          'remark'=>$request->remark,
          'skucode'=>json_encode($data['skucode']),
          'productname'=>json_encode($data['productname']),
          'mrp'=>json_encode($data['mrp']),
          'qty'=>json_encode($data['qty']),
          'receivedqty'=>json_encode($data['receivedqty']),
          'unitprice'=>json_encode($data['unitprice']),
          'buyprice'=>json_encode($data['buyprice']),
          //'discount'=>json_encode($data['discount']),
          'mfgdata'=>json_encode($data['mfgdata']),
          'expdate'=>json_encode($data['expdate']),
          'tax'=>json_encode($data['tax']),
          'cess'=>json_encode($data['cess']),
          'apmc'=>json_encode($data['apmc']),
          'returnquantity'=>json_encode($data['returnquantity']),
          'total'=>json_encode($data['total']),
          'sub_total'=>$request->sub_total,
          'total_tax'=>$request->total_tax,
          'grand_total'=>$request->grand_total,
          'tax_price'=>json_encode($data['hiddenttax']),
          'credit'=>json_encode($credit),
          'debit'=>json_encode($debit),
        ];
    
        $insert=DB::table('receivepos')->where('id',$id)->update($form_data);

        //$purchasedata = Receivepo::create($form_data);
        $supplier=Supplier::with('suppliersname')->where('supplier_id',$request->suppplierid)->first();

        $price=0;
        $purchaseprice=0;

        foreach($supplier->suppliersname as $count){

          $price=$price+$count->grand_total;
          $purchaseprice=$purchaseprice+$count->purchage_grand_total;

        }
    
        $creditordebit = $price-$purchaseprice;

        if($creditordebit > 0){
            $crd='Credit'.'-'.$creditordebit;
        
        }
        elseif($creditordebit < 0){
            
             $crd='Debit'.'-'.substr($creditordebit, 1);;
        } 

        Supplier::where('supplier_id',$request->suppplierid)->update(['balance'=>$crd]);

        Session::flash('message', 'GRN Updated successfully.');
        return redirect()->route('admin.receivepo');

      }

      return view('admin.vendor.edit_receivepo',compact('purchasedata','gst','productlist'));
    }


    public function cess(Request $request){

      $data=$request->cess;
      $find=GSTRate::where('gst_rate',$data)->first();
      // $find->id;
      $prod=Product::where('title',$request->title)->update(['cess_tax'=>$find->id]); 
      $datap=Product::where('title',$request->title)->where('cess_tax',$find->id)->first();
      $cess=GSTRate::where('id',$datap->cess_tax)->first();
      $sgst_tax=GSTRate::where('id',$datap->sgst_tax)->first();
      $cgst_tax=GSTRate::where('id',$datap->cgst_tax)->first();
      $igst_tax=GSTRate::where('id',$datap->igst_tax)->first();
      $ugst_tax=GSTRate::where('id',$datap->ugst_tax)->first();
      $apmc_tax=GSTRate::where('id',$datap->apmc_tax)->first();
      $taxcount=0;
      if(!empty($cess->gst_rate)){
      $taxcount+=$cess->gst_rate;
      }
      if(!empty($sgst_tax->gst_rate)){
      $taxcount+=$sgst_tax->gst_rate;
      }
      if(!empty($cgst_tax->gst_rate)){
      $taxcount+=$cgst_tax->gst_rate;
      }
      if(!empty($igst_tax->gst_rate)){
      $taxcount+=$igst_tax->gst_rate;
      }
      if(!empty($ugst_tax->gst_rate)){
      $taxcount+=$ugst_tax->gst_rate;
      }
      if(!empty($apmc_tax->gst_rate)){
      $taxcount+=$apmc_tax->gst_rate;
      }
      
      
      return response()->json([
      
      'status'=>1,
      'productdata' => $taxcount,
      
      ]);
      
    }

    public function apmc(Request $request){

      $data=$request->apmc;
      $find=GSTRate::where('gst_rate',$data)->first();
      // $find->id;
      $prod=Product::where('title',$request->title)->update(['apmc_tax'=>$find->id]); 
      $datap=Product::where('title',$request->title)->where('apmc_tax',$find->id)->first();

      $cess=GSTRate::where('id',$datap->cess_tax)->first();
      $sgst_tax=GSTRate::where('id',$datap->sgst_tax)->first();
      $cgst_tax=GSTRate::where('id',$datap->cgst_tax)->first();
      $igst_tax=GSTRate::where('id',$datap->igst_tax)->first();
      $ugst_tax=GSTRate::where('id',$datap->ugst_tax)->first();
      $apmc_tax=GSTRate::where('id',$datap->apmc_tax)->first();
      $taxcount=0;

      if(!empty($cess->gst_rate)){
      $taxcount+=$cess->gst_rate;
      }
      if(!empty($sgst_tax->gst_rate)){
      $taxcount+=$sgst_tax->gst_rate;
      }
      if(!empty($cgst_tax->gst_rate)){
      $taxcount+=$cgst_tax->gst_rate;
      }
      if(!empty($igst_tax->gst_rate)){
      $taxcount+=$igst_tax->gst_rate;
      }
      if(!empty($ugst_tax->gst_rate)){
      $taxcount+=$ugst_tax->gst_rate;
      }
      if(!empty($apmc_tax->gst_rate)){
      $taxcount+=$apmc_tax->gst_rate;
      }
      
      
      return response()->json([
      
        'status'=>1,
        'productdata' => $taxcount,
      
      ]);
      
    }

    public function tex(Request $request){
      
      $datap=Product::where('title',$request->title)->first();
      $cess=GSTRate::where('id',$datap->cess_tax)->first();
      $sgst_tax=GSTRate::where('id',$datap->sgst_tax)->first();
      $cgst_tax=GSTRate::where('id',$datap->cgst_tax)->first();
      $igst_tax=GSTRate::where('id',$datap->igst_tax)->first();
      $ugst_tax=GSTRate::where('id',$datap->ugst_tax)->first();
      $apmc_tax=GSTRate::where('id',$datap->apmc_tax)->first();
      $taxcount=0;
      if(!empty($cess->gst_rate)){
      $taxcount+=$cess->gst_rate;
      }
      if(!empty($sgst_tax->gst_rate)){
      $taxcount+=$sgst_tax->gst_rate;
      }
      if(!empty($cgst_tax->gst_rate)){
      $taxcount+=$cgst_tax->gst_rate;
      }
      if(!empty($igst_tax->gst_rate)){
      $taxcount+=$igst_tax->gst_rate;
      }
      if(!empty($ugst_tax->gst_rate)){
      $taxcount+=$ugst_tax->gst_rate;
      }
      if(!empty($apmc_tax->gst_rate)){
      $taxcount+=$apmc_tax->gst_rate;
      }
      
      $taxcountp=$request->purchage*$taxcount/100*1;
      return response()->json([
      
      'status'=>1,
      'productdata' => $taxcount,
      'tax'=>$taxcountp
      
      ]);
    }

    public function delete($id){

        Receivepo::find($id)->delete();
        Session::flash('message', 'GRN deleted successfully.');
        return redirect()->route('admin.receivepo');

    }

    public function mrp(Request $request){
        
        $datap=Product::where('title',$request->title)->first();
        $data=ProductAttribute::where(['product_id'=>$datap->id,'mrp_price'=>$request->mrp])->first();
        
        $cess=GSTRate::where('id',$datap->cess_tax)->first();
        $sgst_tax=GSTRate::where('id',$datap->sgst_tax)->first();
        $cgst_tax=GSTRate::where('id',$datap->cgst_tax)->first();
        $igst_tax=GSTRate::where('id',$datap->igst_tax)->first();
        $ugst_tax=GSTRate::where('id',$datap->ugst_tax)->first();
        $apmc_tax=GSTRate::where('id',$datap->apmc_tax)->first();
        $taxcount=0;
        if(!empty($cess->gst_rate)){
        $taxcount+=$cess->gst_rate;
        }
        if(!empty($sgst_tax->gst_rate)){
        $taxcount+=$sgst_tax->gst_rate;
        }
        if(!empty($cgst_tax->gst_rate)){
        $taxcount+=$cgst_tax->gst_rate;
        }
        if(!empty($igst_tax->gst_rate)){
        $taxcount+=$igst_tax->gst_rate;
        }
        if(!empty($ugst_tax->gst_rate)){
        $taxcount+=$ugst_tax->gst_rate;
        }
        if(!empty($apmc_tax->gst_rate)){
        $taxcount+=$apmc_tax->gst_rate;
        }
        //$taxcount=$cess->gst_rate+$sgst_tax->gst_rate+$cgst_tax->gst_rate+$igst_tax->gst_rate+$ugst_tax->gst_rate+$apmc_tax->gst_rate;
        $taxcountp=$data->basic_price*$taxcount/100*1;
        return response()->json([
        
        'status'=>1,
        'taxcount' => $taxcount,
        'tax'=>$taxcountp ,
        'productdata' => $data,
        
        
        ]);
        
    }

    public function filterSearch(Request $request)
    {   
        
        $datas=$request->all();
        $receivepodatacount=0;

        $receivepodata=Receivepo::where('poreference','LIKE','%'.$datas['query']."%")->orWhere('suppplierid','LIKE','%'.$datas['query']."%")->orWhere('supppliername','LIKE','%'.$datas['query']."%")->paginate(25);

        $receivepodatacount=Receivepo::where('poreference','LIKE','%'.$datas['query']."%")->orWhere('suppplierid','LIKE','%'.$datas['query']."%")->orWhere('supppliername','LIKE','%'.$datas['query']."%")->count();
           
        if($receivepodatacount>0){

          $currentpage = $receivepodata->currentPage();

          return view('admin.vendor.paggination_receivepo_view', compact(['receivepodata','currentpage']))->render(); 
        }
        else{

          ?>
            <tr>
              <td colspan="12">No matching records found</td>
            </tr>
          <?php 
        }
    }
    
}
 