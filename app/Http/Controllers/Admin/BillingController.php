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
use Carbon\Carbon;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $membershipdata = Membership::get();
        //$customerdata = User::where('role','user')->where('mobile_status',1)->get();

        $customerdata = User::where('role','user')->get();

        return view('admin.billing.billing',compact(['customerdata','membershipdata']));
    }

    public function Sale(){

        if (Auth::user()->role=='biller') {
            
            $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->paginate(25);

        }
        else{

            $offlinebillingdata = OfflineBilling::with('billerName')->paginate(25);
            
        }
        
        $currentpage = $offlinebillingdata->currentPage();
        return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));

    }

    public function SaleType($type){

        if ($type=='today') {
            
            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }else{

                $offlinebillingdata = OfflineBilling::with('billerName')->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }


            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
            

        }
        elseif($type=='cash'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where('payment_method','COD')->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }
            else{


                $offlinebillingdata = OfflineBilling::with('billerName')->where('payment_method','COD')->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }


            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type=='card'){

            if(Auth::user()->role=='biller'){
               
                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Card')->orWhere('payment_method1','Card');

              })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where(function($query){

                    return $query->where('payment_method','Card')->orWhere('payment_method1','Card');

              })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }
            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type=='paytm'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Paytm Wallet')->orWhere('payment_method1','Paytm Wallet');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where(function($query){

                    return $query->where('payment_method','Paytm Wallet')->orWhere('payment_method1','Paytm Wallet');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }

            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type == 'googlepay'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Google Pay')->orWhere('payment_method1','Google Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where(function($query){

                    return $query->where('payment_method','Google Pay')->orWhere('payment_method1','Google Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }

            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type == 'phonepay'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Phone Pay')->orWhere('payment_method1','Phone Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where(function($query){

                    return $query->where('payment_method','Phone Pay')->orWhere('payment_method1','Phone Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }

            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type =='amazonpay'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where(function($query){

                    return $query->where('payment_method','Amazon Pay')->orWhere('payment_method1','Amazon Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where(function($query){

                    return $query->where('payment_method','Amazon Pay')->orWhere('payment_method1','Amazon Pay');
                    
                  })->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }

            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));
        }
        elseif($type =='ebcoupon'){

            if(Auth::user()->role=='biller'){

                $offlinebillingdata = OfflineBilling::with('billerName')->where('biller_id',Auth::user()->id)->where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);

            }
            else{

                $offlinebillingdata = OfflineBilling::with('billerName')->where('eb_coupon_method','Eb Coupon')->whereDate('created_at',\Carbon\Carbon::today())->paginate(25);
            }

            $currentpage = $offlinebillingdata->currentPage();
            return view('admin.billing.sale',compact(['offlinebillingdata','currentpage']));

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function getBillingItem(Request $request){

        if(!is_numeric($request->bar_code)){

            $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->where('title',$request->bar_code)->first();

            if ($productgenuinedata != null) {
                
                $productdata = ProductAttribute::with('productName')->with('productExpiry')->where('product_id',$productgenuinedata->id)->get();
                $productcontent=1;

            }
            else{
                
                $productdata=[];
                $productcontent=0;
            }

        }
        else{
    
        $productdata = ProductAttribute::with('productName')->with('productExpiry')->where('barcode_id',$request->bar_code)->get();

            if ($productdata->count()>0) {
                
                $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productdata->first())->productName->id);

                $productcontent = 1;
            }
            else{

                $productcontent = 0;
            }

        }


        if ($productcontent>0){
            
            $gstdata = get_Total_Tax($productgenuinedata);

            $date = strtotime(now());

            $genuinedate = date('Y-m-d',$date);

            $usermembershipdata = User::where('id',$request->user_id)->where('membership_status',1)->where('m_start_date','<=',$genuinedate)->where('m_end_date','>=',$genuinedate)->get();

            if ($usermembershipdata->count()==1) {
                
                $m_status = 1;
            }
            else{

                $m_status = 0;
            }

            return response()->json([

                    'success'=>1,
                    'productdata'=>$productdata,
                    'gstdata'=>$gstdata,
                    'membership_status'=>$m_status,
                    'productgenuine'=>$productgenuinedata


            ]);
        }
        else{

            return response()->json([

                'success'=>0,
                'productdata'=>$productdata,
                'gstdata'=>null,
                'membership_status'=>null,

            ]);

        }
    }


    public function getBillingProductAttr(Request $request){

        $date = strtotime(now());

        $genuinedate = date('Y-m-d',$date);

        $usermembershipdata = User::where('id',$request->user_id)->where('membership_status',1)->where('m_start_date','<=',$genuinedate)->where('m_end_date','>=',$genuinedate)->get();

        $productattrdata = ProductAttribute::with('ProductName')->with('productExpiry')->find($request->id);

        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find($productattrdata->productName->id);


        $gstdata = get_Total_Tax($productgenuinedata);

        if ($request->qty=='') {
            
            $quantity = 1;
        }
        else{

            $quantity = intval($request->qty);
        }

        if ($usermembershipdata->count()==1) {
        
            $discount = ($productattrdata->mrp_price-$productattrdata->membership_price)*100/$productattrdata->mrp_price;

            $price =   $productattrdata->membership_price;

            $discountround = round($discount,3);

            $amount = $productattrdata->membership_price*$quantity*100/(100+$gstdata);

            $roundamount = round($amount,2);

            $gst = ($productattrdata->membership_price*$quantity)-$amount;
            $roundgst = round($gst,2);

        }
        else{

            $discount = ($productattrdata->mrp_price-$productattrdata->selling_price)*100/$productattrdata->mrp_price;

            $price = $productattrdata->selling_price;

            $discountround = round($discount,3);

            $amount = $productattrdata->selling_price*$quantity*100/(100+$gstdata);

            $roundamount = round($amount,2);

            $gst = ($productattrdata->selling_price*$quantity)-$amount;
            $roundgst = round($gst,2);

        }

    
        return response()->json([

            'success'=>1,
            'quantity'=>$quantity,
            'discount'=>$discountround,
            'amount'=>$roundamount,
            'price'=>$price,
            'productexpirydata'=>$productattrdata->productExpiry,
            'totalgst'=>$roundgst,
            'mrp_price'=>$productattrdata->mrp_price

        ]);

        // }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   

        $mobile_no = explode(' (',$request->customer_info);

        $userdata = User::where('mobile',intval($mobile_no[0]))->first();

        $receiptid = 'EB'.strtotime(now());

        if ($request->has('credit_note_rupees')) {
            
            $creditdata = ReturnItems::where('credit_id',$request->genuine_cn_number)->first();

            $cn_number = $request->genuine_cn_number;
            $cn_rupees = floatval($request->credit_note_rupees);

            $remains_cn_rupees = floatval($creditdata->credit_note_rupees)-$cn_rupees;

            $round_remains_cn_rupees = round($remains_cn_rupees,2);

            if ($round_remains_cn_rupees == 0.00) {
                
                $creditdata->credit_note_rupees = $round_remains_cn_rupees;
                $creditdata->credit_note_status = 1;

            }
            else{

                $creditdata->credit_note_rupees = $round_remains_cn_rupees;

            }

            $creditdata->save();

            $cn_status=1;

        }
        else{

            $cn_status=0;
            $cn_rupees=null;
            $cn_number=null;

        }

        $hsn = array();
        $unittax = array();
        $mrpprice = array();
        $weight = array();

        $unitgst = array();
        $unitothers = array();

        $unitcheck = array();

        for($i=0;$i<(count($request->bar_code));$i++){

            $barcode = ($request->bar_code)[$i];

            $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->get();

            array_push($unitcheck,$productattributedata->first()->unit_check);

            array_push($weight,$productattributedata->first()->unit);

            array_push($hsn,$productattributedata->first()->productName->hsn_code);
            $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);
            
            $taxdata = get_Total_Tax($productgenuinedata);

            array_push($unittax,$taxdata);

            $gstdata = get_total_Gst($productgenuinedata);
            array_push($unitgst,$gstdata);

            $othertaxdata = get_others_tax($productgenuinedata);
            array_push($unitothers,$othertaxdata);

            $productmrpprice = ProductAttribute::find($request->mrp_price[$i]);

            array_push($mrpprice,$productmrpprice->mrp_price);

            if ($request->expiry_date[$i]=='null') {

                $qtydata = ProductExpiry::where('productattr_id',$request->mrp_price[$i])->where('expiry_date',null)->first();

               
           }else{

                $qtydata = ProductExpiry::where('productattr_id',$request->mrp_price[$i])->where('expiry_date',$request->expiry_date[$i])->first();
           }



            $newquantity = $qtydata->quantity-intval($request->quantity[$i]);

            $qtydata->quantity = $newquantity;

            $qtydata->save();

        }

        $paymenttype =null;
        $receivedcash = null;

        $paymenttype1 = null;
        $receivedcash1 = null;

        $ebcouponpaymentcol = null;
        $ebcouponcashcol = null;

        //for three payments
        if ($request->payment_type2 != null && $request->payment_type=='Eb Coupon' && $request->payment_type1=='COD') {
            
            $paymenttype = $request->payment_type1;
            $receivedcash = $request->received_cash_1;

            $ebcouponpaymentcol = $request->payment_type;
            $ebcouponcashcol = $request->received_cash;

            $calculation=$request->received_cash+$request->received_cash_1;
            $receivedcash1 = floatval($request->grand_total)-floatval($calculation);
            $paymenttype1 = $request->payment_type2;

        } //for three payments
        elseif($request->payment_type2 != null && $request->payment_type=='COD' && $request->payment_type1=='Eb Coupon'){

            $paymenttype = $request->payment_type;
            $receivedcash = $request->received_cash;

            $ebcouponpaymentcol = $request->payment_type1;
            $ebcouponcashcol = $request->received_cash_1;

            $calculation=$request->received_cash+$request->received_cash_1;
            $receivedcash1 = floatval($request->grand_total)-floatval($calculation);
            $paymenttype1 = $request->payment_type2;

        } //for two payments
        elseif($request->payment_type2 == null && $request->payment_type=='COD' && $request->payment_type1=='Eb Coupon'){

            $paymenttype = $request->payment_type;
            $receivedcash = $request->received_cash;

            $ebcouponpaymentcol = $request->payment_type1;
            $ebcouponcashcol = $request->received_cash_1;


        } //for two payments
        elseif($request->payment_type2 == null && $request->payment_type=='Eb Coupon' && $request->payment_type1=='COD'){

            $paymenttype = $request->payment_type1;
            $receivedcash = $request->received_cash_1;

            $ebcouponpaymentcol = $request->payment_type;
            $ebcouponcashcol = $request->received_cash;

        }   //for two payments
        elseif($request->payment_type2 == null && $request->payment_type=='Eb Coupon' && $request->payment_type1!='COD' && $request->payment_type1!='Eb Coupon'){


            $ebcouponpaymentcol = $request->payment_type;
            $ebcouponcashcol = $request->received_cash;

            if($request->received_cash){

                 $receivedcash1 = floatval($request->grand_total)-floatval($request->received_cash);

            }

            $paymenttype1 = $request->payment_type1;


        }   //for two payments
        elseif($request->payment_type2 == null && $request->payment_type=='COD' && $request->payment_type1!='COD' && $request->payment_type1!='Eb Coupon'){


            $paymenttype = $request->payment_type;
            $receivedcash = $request->received_cash;

            if($request->received_cash){

                 $receivedcash1 = floatval($request->grand_total)-floatval($request->received_cash);

            }

            $paymenttype1 = $request->payment_type1;
        
        } // for single payments
        elseif($request->payment_type2 == null && $request->payment_type1==null && $request->payment_type=='Eb Coupon'){

                $ebcouponpaymentcol = $request->payment_type;
                $ebcouponcashcol = $request->received_cash;
           
        } // for single payments
        elseif($request->payment_type2 == null && $request->payment_type1==null && $request->payment_type=='COD'){

            $paymenttype = $request->payment_type;
            $receivedcash = $request->received_cash;


        } // for single payments
        elseif($request->payment_type2 == null && $request->payment_type1==null && $request->payment_type!='COD' && $request->payment_type!='Eb Coupon'){

            $paymenttype = $request->payment_type;
            $receivedcash = $request->grand_total;

        } 
        

        $form_data = [

            'biller_id'=>Auth::user()->id,
            'name'=> $userdata->name,
            'mobile'=> $userdata->mobile,
            'receipt_id'=> $receiptid,
            'barcode'=> json_encode($request->bar_code),
            'product_name'=>json_encode($request->product_name),
            'weight'=>json_encode($weight),
            'unit_check'=>json_encode($unitcheck),
            'unit_tax'=>json_encode($unittax),
            'unit_gst'=>json_encode($unitgst),
            'unit_others'=>json_encode($unitothers),
            'hsn_sac'=>json_encode($hsn),
            'mrp_price'=>json_encode($mrpprice),
            'price'=>json_encode($request->price),
            'discount'=>json_encode($request->discount),
            'expiry_date'=>json_encode($request->expiry_date),
            'quantity'=>json_encode($request->quantity),
            'tax'=>json_encode($request->tax),
            'amount'=>json_encode($request->product_amount),
            'subtotal'=>$request->sub_total,
            'total_tax'=>$request->total_tax,
            'grand_total'=>$request->grand_total,
            'payment_method'=>$paymenttype,
            'received_cash'=>$receivedcash,
            'eb_coupon_method'=>$ebcouponpaymentcol,
            'eb_coupon_cash'=>$ebcouponcashcol,
            'payment_method1'=>$paymenttype1,
            'received_cash1'=>$receivedcash1,
            'cn_status'=>$cn_status,
            'cn_rupees'=>$cn_rupees,
            'cn_number'=>$cn_number,
            'created_at'=>date('Y-m-d h-i-s',strtotime(now())),

        ];

        $billingdata = OfflineBilling::create($form_data);

        if($billingdata){

            $billingid = $billingdata->id;            
            Session::flash('message', 'Bill Submitted successfully.');
            Session::flash('billingid',$billingid);           
            return redirect()->route('admin.billing');

        }

    }

    public function generateOffilineBill($id){

        $billingupdatedata = OfflineBilling::find($id)->update(['status'=>1]);
        $billingupdatecount = OfflineBilling::where('id',$id)->first();



        $total_quantity = 0;

        if ($billingupdatedata) {
            
            $billingdata = OfflineBilling::find($id);

            for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++){

                if (json_decode($billingdata->unit_check)[$i]=='nos') {
                    
                    $total_quantity= $total_quantity+intval(json_decode($billingdata->quantity)[$i]);

                }
                else{

                    $total_quantity= $total_quantity+1;
                }
                

            }

        }


        $size = array(0,0,500+(count(json_decode($billingupdatecount->barcode))*53),205.9447);
        $pdf = PDF::loadView('admin.billing.billingslip',['totalqty'=>$total_quantity,'billingdata'=>$billingdata])->setPaper($size, 'landscape');

        return $pdf->stream($billingdata->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $offlinebillingdata = OfflineBilling::with('billerName')->find($id);
        return view('admin.billing.billing_view',compact(['offlinebillingdata']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.billing.modify_bill');
    }

    public function GetReceiptIdData(Request $request){

        $billingdata = OfflineBilling::where('receipt_id',$request->receipt_id)->get();

        if ($billingdata->count()>0) {
           
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

    public function ModiefiedReceiptId($id){

        $billingdata = OfflineBilling::where('receipt_id',$id)->get();

        Session::flash('receiptid',$id);

        return view('admin.billing.modify_bill');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        //dd($request->quantity);
        $hsn = array();
        $unittax = array();
        $mrpprice = array();
        $weight = array();

        $unitgst = array();
        $unitothers = array();
        $unitcheck = array();

        $newqty = array();

        $update  = OfflineBilling::where('receipt_id',$request->receipt_id)->first();

        for($i=0;$i<(count(json_decode($update->quantity)));$i++){

            if (array_key_exists($i, $request->bar_code)) {
                
                $barcode = ($request->bar_code)[$i];

                $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->where('mrp_price',$request->mrp_price[$i])->get();

                array_push($unitcheck,$productattributedata->first()->unit_check);

                array_push($weight,$productattributedata->first()->unit);

                array_push($hsn,$productattributedata->first()->productName->hsn_code);
                $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);
                
                $taxdata = get_Total_Tax($productgenuinedata);

                array_push($unittax,$taxdata);

                $gstdata = get_total_Gst($productgenuinedata);
                array_push($unitgst,$gstdata);

                $othertaxdata = get_others_tax($productgenuinedata);
                array_push($unitothers,$othertaxdata);

        
                if ($request->expiry_date[$i]=='null') {

                    $qtydata = ProductExpiry::where('productattr_id',$productattributedata->first()->id)->where('expiry_date',null)->first();
               
                }else{


                    $qtydata = ProductExpiry::where('productattr_id',$productattributedata->first()->id)->where('expiry_date',$request->expiry_date[$i])->first();
                }



                $unitnewqty = floatval(json_decode($update->quantity)[$i])-floatval($request->quantity[$i]);

        
                $newquantity = $qtydata->quantity+$unitnewqty;

                $qtydata->quantity = $newquantity;

                $qtydata->save();
                
            }
            else{

                $productattributedata = ProductAttribute::with('productName')->where('barcode_id',json_decode($update->barcode)[$i])->where('mrp_price',json_decode($update->mrp_price)[$i])->get();

                $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);

                if (json_decode($update->expiry_date)[$i]=='null') {

                    $qtydata = ProductExpiry::where('productattr_id',$productattributedata->first()->id)->where('expiry_date',null)->first();
               
                }else{


                    $qtydata = ProductExpiry::where('productattr_id',$productattributedata->first()->id)->where('expiry_date',json_decode($update->expiry_date)[$i])->first();
                }

                $newquantity = $qtydata->quantity+floatval(json_decode($update->quantity)[$i]);

                $qtydata->quantity = $newquantity;

                $qtydata->save();


            }
            

        }



        $update->barcode = json_encode($request->bar_code);
        $update->product_name = json_encode($request->product_name);
        $update->weight = json_encode($weight);
        $update->unit_check = json_encode($unitcheck);
        $update->unit_tax = json_encode($unittax);
        $update->unit_gst = json_encode($unitgst);
        $update->unit_others = json_encode($unitothers);
        $update->hsn_sac = json_encode($hsn);
        $update->mrp_price = json_encode($request->mrp_price);
        $update->price = json_encode($request->price);
        $update->discount = json_encode($request->discount);
        $update->expiry_date = json_encode($request->expiry_date);
        $update->quantity = json_encode($request->quantity);
        $update->tax = json_encode($request->tax);
        $update->amount = json_encode($request->product_amount);
        $update->subtotal = $request->sub_total;
        $update->total_tax = $request->total_tax;
        $update->grand_total = $request->grand_total;

        $update->save();

        $billingid = $update->id;

        Session::flash('message', 'Bill Updated successfully.');
        Session::flash('billingid',$billingid);           
        return redirect()->route('admin.billing.sale');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function DeleteSale($id)
    {

        $billingdata = OfflineBilling::with('billerName')->find($id);

        if ($billingdata != null) {
            
            for($i=0;$i<(count(json_decode($billingdata->barcode)));$i++){

                $product = json_decode($billingdata->product_name)[$i];
                $barcode = json_decode($billingdata->barcode)[$i];
                $mrp = json_decode($billingdata->mrp_price)[$i];
                $quantity = json_decode($billingdata->quantity)[$i];
                $expiry = json_decode($billingdata->expiry_date)[$i];

                $productdata = Product::where('title',$product)->first();

                if (!is_null($productdata)) {
                
                    $productattrdata = ProductAttribute::where('product_id',$productdata->id)->where('barcode_id',$barcode)->where('mrp_price',$mrp)->first();

                    if (!is_null($productattrdata)) {
                        
                        $productexpirydata = ProductExpiry::where('product_id',$productdata->id)->where('productattr_id',$productattrdata->id)->where('expiry_date',$expiry)->first();


                        if (!is_null($productexpirydata)) {

                            $productexpirydata->quantity = $productexpirydata->quantity+floatval(json_decode($billingdata->quantity));

                            $productexpirydata->save();
                        }

                    }

                }

            }

            $billingdata->delete();
            Session::flash('message','Bill Deleted Successfully');
            return redirect()->route('admin.billing.sale');

        }

        
    }

    public function GetReceiptId(Request $request){

        $userdata = OfflineBilling::where('receipt_id','LIKE','%'.$request->search.'%')->pluck('receipt_id');

        if ($userdata->count()>0) {
           
            return response()->json([

                'status'=>1,
                'billingdata'=>$userdata

            ]); 

        }else{

            return response()->json([

                'status'=>0

            ]);

        }
    }

    public function itemSearch(Request $request){

        if($request->ajax())
        {
            $datas=$request->all();

            $billerNamedata = User::where('name','LIKE','%'.$datas['query']."%")->get();

            $biller = array();
            $offlinebillingcount=0;
            if($billerNamedata){
                foreach ($billerNamedata as $select) {
                   $biller[]=$select->id;
                }
            }

            if($biller){

                if (Auth::user()->role =='biller') {
                        
                    $offlinebillingdata=OfflineBilling::where('biller_id',Auth::user()->id)->paginate(25);
                    $offlinebillingcount=OfflineBilling::where('biller_id',Auth::user()->id)->count();          

                }
                else{

                    $offlinebillingdata=OfflineBilling::whereIn('biller_id',$biller)->paginate(25);
                    $offlinebillingcount=OfflineBilling::whereIn('biller_id',$biller)->count();
                }
         

            }else{

                if (Auth::user()->role =='biller') {
                    
                  $offlinebillingdata=OfflineBilling::where('biller_id',Auth::user()->id)->where('name','LIKE','%'.$datas['query']."%")->orWhere('receipt_id','LIKE','%'.$datas['query']."%")->orWhere('payment_method','LIKE','%'.$datas['query']."%")->paginate(25);


                  $offlinebillingcount=OfflineBilling::where('biller_id',Auth::user()->id)->where('name','LIKE','%'.$datas['query']."%")->orWhere('receipt_id','LIKE','%'.$datas['query']."%")->orWhere('payment_method','LIKE','%'.$datas['query']."%")->count();

                }else{


                  $offlinebillingdata=OfflineBilling::where('name','LIKE','%'.$datas['query']."%")->orWhere('receipt_id','LIKE','%'.$datas['query']."%")->orWhere('payment_method','LIKE','%'.$datas['query']."%")->paginate(25);


                  $offlinebillingcount=OfflineBilling::where('name','LIKE','%'.$datas['query']."%")->orWhere('receipt_id','LIKE','%'.$datas['query']."%")->orWhere('payment_method','LIKE','%'.$datas['query']."%")->count();

                }

            }

            if($offlinebillingcount>0){

                $currentpage = $offlinebillingdata->currentPage();
                return view('admin.billing.paggination_sale', compact(['offlinebillingdata','currentpage']))->render();
                    
            }else{?>
            <tr>
                <td colspan="5">No matching records found</td>
            </tr>
            <?php }
        }
    }

    public function GetNetStock(Request $request){

        $productdata = Product::where('title',$request->product)->first();

        $productattrdata = ProductAttribute::where('product_id',$productdata->id)->where('mrp_price',$request->mrp_price)->first();

        $expirydata = ProductExpiry::where('product_id',$productdata->id)->where('productattr_id',$productattrdata->id)->where('expiry_date',$request->expiry_date)->first();

        if ($expirydata != null) {
            
            return response()->json([

                'status'=>1,
                'netstock'=>$expirydata

            ]);

        }else{

            return response()->json([

                'status'=>0,               

            ]);

        }

        

    }



}
