<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\GSTRate;
use App\Mail\POMail;
use PDF;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $purchasedata = Purchase::paginate(25);
        $currentpage = $purchasedata->currentPage();
        return view('admin.vendor.purchase_list',compact(['purchasedata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $purchaselastelement = Purchase::latest()->first();

        if ($purchaselastelement != null) {

            $purchaseid =  $purchaselastelement->purchase_id;
            $purchaseidg = explode("EBPO",$purchaseid)[1];

            $counter = str_pad((int)$purchaseidg+1, 4 ,"0",STR_PAD_LEFT);
            $new_purchaseidg = $counter;

        }
        else{

            $new_purchaseidg = '0001';
        }

        $supplierdata = Supplier::get();
        return view('admin.vendor.purchase',compact(['supplierdata','new_purchaseidg']));

    }

    public function getProduct(Request $request){

        $productdata = Product::with(['productAttribute','sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->where('product_code',$request->product_code)->first();



        if ($productdata != null) {

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

    public function getPurchasePrice(Request $request){

        $productattrdata = ProductAttribute::find($request->id);

        return response()->json([

            'status'=>1,
            'mrpdata'=>$productattrdata

        ]);
    }

    public function itemSearch(Request $request)
    {

        $productdata = Product::with('productAttribute')->Where('title','LIKE','%'.$request->search.'%')->get();

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->advance_payment_type=='partial') {
            $paymnet_option = $request->payment_option;
            $payment_percent_amount = $request->payment_amount;
        }
        else if($request->advance_payment_type=='credit'){
            $paymnet_option = null;
            $payment_percent_amount = null;
        }
        else{
            $paymnet_option = null;
            $payment_percent_amount = $request->grand_total;
        }
        $unit_total_tax = array();
        for ($i=0; $i <count($request->sku_code) ; $i++) {
            $sgst_tax =  $request->sgst_tax[$i];
            $cgst_tax =  $request->cgst_tax[$i];
            $igst_tax =  $request->igst_tax[$i];
            $ugst_tax =  $request->ugst_tax[$i];
            $cess_tax =  $request->cess_tax[$i];
            $apmc_tax =  $request->apmc_tax[$i];
            if ($sgst_tax==null) {
                $sgst_tax=0;
            }
             if ($igst_tax==null) {
                $igst_tax=0;
            }
            if ($ugst_tax==null) {
                $ugst_tax=0;
            }
            if ($cgst_tax==null) {
                $cgst_tax=0;
            }
            if ($cess_tax==null) {
                $cess_tax=0;
            }
            if ($apmc_tax==null) {
                $apmc_tax=0;
            }
            $total_tax = $sgst_tax+$cgst_tax+$igst_tax+$ugst_tax+$cess_tax+$apmc_tax;
            array_push($unit_total_tax, $total_tax);
        }
        $form_data = [
            'supplier_id'=>$request->supplier_info,
            'purchase_id'=>'EBPO'.$request->purchase_id,
            'sku_code'=>json_encode($request->sku_code),
            'seller'=>$request->seller,
            'ship_address'=>$request->shipping_address,
            'ship_to'=>$request->ship_to,
            'product_name'=>json_encode($request->product_name),
            'mrp_price'=>json_encode($request->mrp_price),
            'basic_price'=>json_encode($request->basic_price),
            'quantity'=>json_encode($request->quantity),
            'weight'=>json_encode($request->weight),
            'sgst_tax'=>json_encode($request->sgst_tax),
            'cgst_tax'=>json_encode($request->cgst_tax),
            'igst_tax'=>json_encode($request->igst_tax),
            'ugst_tax'=>json_encode($request->ugst_tax),
            'cess_tax'=>json_encode($request->cess_tax),
            'apmc_tax'=>json_encode($request->apmc_tax),
            'unit_tax_percentage'=>json_encode($unit_total_tax),
            'tax_price'=>json_encode($request->tax),
            'amount'=>json_encode($request->product_amount),
            'sub_total'=>$request->sub_total,
            'total_tax'=>$request->total_tax,
            'grand_total'=>$request->grand_total,
            'po_delivery_date'=>$request->po_delivery_date,
            'advance_payment_type'=>$request->advance_payment_type,
            'payment_rupee_percent'=>$paymnet_option,
            'advance_payment_amount'=>$payment_percent_amount,
        ];
        $purchasedata = Purchase::create($form_data);
        //email
        $data['email'] = $purchasedata->supplierName->secondary_email;
        //$data['email'] = 'manoj.epic1@gmail.com';
        $emailarr = explode(';',$data['email']);
        $data['client_name'] = $purchasedata->supplierName->supplier_name;
        //$data['client_name'] = 'Manoj';
        $data['subject'] = 'Purchase Order';
        $pdf = PDF::loadView('admin.vendor.purchase_invoice',compact('purchasedata'));
        try{
            foreach($emailarr as $email){
                Mail::to($email, $data["client_name"])->send(new POMail($data,$pdf,$purchasedata));
            }
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            Session::flash('nmail','Mail can not be sent');
            Session::flash('message', 'Purchase saved successfully.');
        }else{
            $purchaseid =   $purchasedata->id;
            Session::flash('mail','Mail has been sent successfully');
            Session::flash('message', 'Purchase saved successfully.');
            Session::flash('purchaseid',$purchaseid);
            return redirect()->route('admin.purchase');
        }
    }

    public function getPurchasePdf($id){
        $purchasedata = Purchase::find(intval($id));
        $pdf = PDF::loadView('admin.vendor.purchase_invoice',['purchasedata'=>$purchasedata]);
        return $pdf->stream($purchasedata->supplierName->supplier_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $podata = Purchase::find($id);
        return view('admin.vendor.single_purchase_view',compact(['podata']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxdata = GSTRate::get();
        $supplierdata = Supplier::get();
        $podata = Purchase::find($id);
        return view('admin.vendor.purchase_edit',compact(['podata','supplierdata','taxdata']));
    }

    public function getMRPrice(Request $request){
        $productdata = Product::with('productAttribute')->where('product_code',$request->product_id)->first();
        return response()->json([
            'productmrp'=>$productdata->productAttribute,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->advance_payment_type=='partial') {
            $paymnet_option = $request->payment_option;
            $payment_percent_amount = $request->payment_amount;
        }
        else if($request->advance_payment_type=='credit'){
            $paymnet_option = null;
            $payment_percent_amount = null;
        }
        else{
            $paymnet_option = null;
            $payment_percent_amount = $request->grand_total;
        }
        $unit_total_tax = array();
        for ($i=0; $i <count($request->sku_code) ; $i++) {
            $sgst_tax =  $request->sgst_tax[$i];
            $cgst_tax =  $request->cgst_tax[$i];
            $igst_tax =  $request->igst_tax[$i];
            $ugst_tax =  $request->ugst_tax[$i];
            $cess_tax =  $request->cess_tax[$i];
            $apmc_tax =  $request->apmc_tax[$i];
            if ($sgst_tax==null) {
                $sgst_tax=0;
            }
             if ($igst_tax==null) {
                $igst_tax=0;
            }
            if ($ugst_tax==null) {
                $ugst_tax=0;
            }
            if ($cgst_tax==null) {
                $cgst_tax=0;
            }
            if ($cess_tax==null) {
                $cess_tax=0;
            }
            if ($apmc_tax==null) {
                $apmc_tax=0;
            }
            $total_tax = $sgst_tax+$cgst_tax+$igst_tax+$ugst_tax+$cess_tax+$apmc_tax;
            array_push($unit_total_tax, $total_tax);

        }
        $update = Purchase::find($request->uni_purchase_id);
        $update->supplier_id = $request->supplier_info;
        $update->purchase_id = 'EBPO'.$request->purchase_id;
        $update->sku_code = json_encode($request->sku_code);
        $update->seller = $request->seller;
        $update->ship_to = $request->ship_to;
        $update->ship_address = $request->shipping_address;
        $update->product_name = json_encode($request->product_name);
        $update->mrp_price = json_encode($request->mrp_price);
        $update->basic_price = json_encode($request->basic_price);
        $update->quantity = json_encode($request->quantity);
        $update->weight = json_encode($request->weight);
        $update->sgst_tax = json_encode($request->sgst_tax);
        $update->cgst_tax = json_encode($request->cgst_tax);
        $update->igst_tax = json_encode($request->igst_tax);
        $update->ugst_tax = json_encode($request->ugst_tax);
        $update->cess_tax = json_encode($request->cess_tax);
        $update->apmc_tax = json_encode($request->apmc_tax);
        $update->unit_tax_percentage = json_encode($unit_total_tax);
        $update->tax_price= json_encode($request->tax);
        $update->amount = json_encode($request->product_amount);
        $update->sub_total= $request->sub_total;
        $update->total_tax = $request->total_tax;
        $update->grand_total = $request->grand_total;
        $update->po_delivery_date = $request->po_delivery_date;
        $update->advance_payment_type = $request->advance_payment_type;
        $update->payment_rupee_percent = $paymnet_option;
        $update->advance_payment_amount = $payment_percent_amount;
        $update->save();
        Session::flash('message', 'PO updated successfully.');
       return redirect()->route('admin.purchase');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Purchase::find($id)->delete();
        Session::flash('message', 'PO deleted successfully.');
        return redirect()->route('admin.purchase');
    }
    //=====View Purchase =======//
    public function checkExpirePurchase(Request $request){
        date_default_timezone_set('Asia/Kolkata');
        $purchasedataloop = Purchase::with('supplierName')->where('expire_status',0)->get();
        if ($purchasedataloop->count()>0) {
            foreach($purchasedataloop as $purchasedata){
                $poexpiredays = $purchasedata->supplierName->po_expiry_duration;
                $pocreatedate = ($purchasedata->created_at)->addDays($poexpiredays);
                $firstdate = date('Y-m-d',strtotime($pocreatedate));
                $enddate = date('Y-m-d',strtotime(now()));
                if($enddate>$firstdate){
                    $purchasedata->expire_status =1;
                    $purchasedata->save();
                }
            }
        }
        return response()->json([
            'success'=>1
        ]);

    }
    function filterSearch(Request $request)
    {
        if($request->ajax()){
            $datas=$request->all();
            $purchasedatacount=0;
           //supplier
            $suppliers=Supplier::where('supplier_id','LIKE','%'.$datas['query']."%")->get();
            $supattr=array();
            $productexpirycount=0;
            if($suppliers){
                foreach ($suppliers as $select) {
                    $supattr[]=$select->id;
                }
            }
            if(!empty($supattr)){
                $purchasedata=Purchase::whereIn('supplier_id',$supattr)->paginate(25);
                $purchasedatacount=Purchase::whereIn('supplier_id',$supattr)->count();
            }else{
                $purchasedata=Purchase::where('purchase_id','LIKE','%'.$datas['query']."%")
                                       ->orWhere('sub_total','LIKE','%'.$datas['query']."%")
                                       ->orWhere('total_tax','LIKE','%'.$datas['query']."%")
                                       ->orWhere('po_delivery_date','LIKE','%'.$datas['query']."%")
                                       ->orWhere('advance_payment_type','LIKE','%'.$datas['query']."%")
                                       ->orWhere('payment_rupee_percent','LIKE','%'.$datas['query']."%")
                                       ->orWhere('advance_payment_amount','LIKE','%'.$datas['query']."%")
                                       ->orWhere('grand_total','LIKE','%'.$datas['query']."%")
                                       ->paginate(25);
                $purchasedatacount=Purchase::where('purchase_id','LIKE','%'.$datas['query']."%")
                                            ->orWhere('total_tax','LIKE','%'.$datas['query']."%")
                                            ->orWhere('sub_total','LIKE','%'.$datas['query']."%")
                                            ->orWhere('po_delivery_date','LIKE','%'.$datas['query']."%")
                                            ->orWhere('advance_payment_type','LIKE','%'.$datas['query']."%")
                                            ->orWhere('payment_rupee_percent','LIKE','%'.$datas['query']."%")
                                            ->orWhere('advance_payment_amount','LIKE','%'.$datas['query']."%")
                                            ->orWhere('grand_total','LIKE','%'.$datas['query']."%")
                                            ->count();
            }
            if($purchasedatacount>0){
                $currentpage = $purchasedata->currentPage();
                return view('admin.vendor.paggination_purchage_list',
                    compact(['purchasedata','currentpage']))->render();
                }else{?>
                <tr>
                <td colspan="12">No matching records found</td>
                </tr>
                <?php
            }
        }
    }
}
