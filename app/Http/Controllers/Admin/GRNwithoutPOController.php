<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductExpiry;
use App\Models\GRNWOPO;
use App\Models\Supplier;

class GRNwithoutPOController extends Controller
{
    
    public function index(){

        $grnwopodata = GRNWOPO::paginate(25);
        $currentpage = $grnwopodata->currentPage();
    	return view('admin.vendor_without_po.row_without_po',compact(['grnwopodata','currentpage']));

    }

    public function show(){

        $supplierdata = Supplier::get();
        return view('admin.vendor_without_po.grn_without_po',compact(['supplierdata']));
    }

    public function getGRNProduct(Request $request){

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

    public function AddGRNProduct(Request $request){


        $grn_id = 'GRNWPO'.strtotime(now());

        $unitgst = array();
        $unitothers = array();

        $cost_pricearr = array();

        $unittax = array();
        $hsn = array();

        for($i=0;$i<(count($request->bar_code));$i++){ 
            
            $barcode = ($request->bar_code)[$i];
            $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->get();

            $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);

            array_push($hsn, $productgenuinedata->hsn_code);

            $taxdata = get_Total_Tax($productgenuinedata);

            array_push($unittax,$taxdata);

            $gstdata = get_total_Gst($productgenuinedata);
            array_push($unitgst,$gstdata);

            $othertaxdata = get_others_tax($productgenuinedata);
            array_push($unitothers,$othertaxdata);

            $cost_price = number_format((floatval(($request->basic_price)[$i])*(floatval($taxdata)+100)/100),2);

            array_push($cost_pricearr, $cost_price);
        }

        $form_data = [

            'lr_number'=>$grn_id,
            'supplier_id'=>$request->supplier_info,
            'carrier_name'=>$request->carrier_name,
            'invoice_number'=>$request->invoice_number,
            'invoice_date'=>$request->invoice_date,
            'invoice_value'=>$request->invoice_value,
            'delivery_date'=>$request->delivery_date,
            'barcode'=>json_encode($request->bar_code),
            'product_name'=>json_encode($request->product_name),
            'mrp_price'=>json_encode($request->mrp_price),
            'unit_price'=>json_encode($request->basic_price),
            'cost_price'=>json_encode($cost_pricearr),
            'sv_sell_price'=>json_encode($request->svsell_price),
            'eb_sell_price'=>json_encode($request->ebsell_price),
            'weight'=>json_encode($request->weight),
            'unit'=>json_encode($request->unit),
            'unit_tax'=> json_encode($unittax),
            'unit_gst'=>json_encode($unitgst),
            'unit_others'=>json_encode($unitothers),
            'sgst'=>json_encode($request->sgst),
            'cgst'=>json_encode($request->cgst),
            'igst'=>json_encode($request->igst),
            'ugst'=>json_encode($request->ugst),
            'cess'=>json_encode($request->cess),
            'apmc'=>json_encode($request->apmc),
            'hsn_sac'=>json_encode($hsn),
            'discount'=>json_encode($request->discount),
            'quantity'=>json_encode($request->quantity),
            'mfg_date'=>json_encode($request->mfg_date),
            'exp_date'=>json_encode($request->expiry_date),
            'tax'=>json_encode($request->tax),
            'amount'=>json_encode($request->product_amount),
            'sub_total'=>$request->sub_total,
            'total_tax'=>$request->total_tax,
            'grand_total'=>$request->grand_total,

        ];

        GRNWOPO::create($form_data);

        getproductgrnwopoid($request->product_name,$request->expiry_date,$request->quantity,$request->mrp_price,$request->basic_price,$request->hsn,$request->svsell_price,$request->ebsell_price,$request->bar_code,$unittax,$request->weight,$request->unit,$request->mfg_date);

    	Session::flash('message','GRN Added Successfully');

    	return redirect()->route('admin.grn_without_po');

    }

    public function edit($id){

        $grnwopodata = GRNWOPO::find($id);
        $supplierdata = Supplier::get();

        Session::flash('grnwithoutpo',$id);
        return view('admin.vendor_without_po.edit_grn_without_po',compact(['supplierdata']));
    }

    public function update(Request $request){

       
        $qtyarr = array();
        $unittax = array();
        $unitgst = array();
        
        $unitothers = array();
        $unitnewqty = array();

        $cost_pricearr = array();

        $update = GRNWOPO::where('lr_number',$request->grnwopo_id)->first();


        if (count(json_decode($update->quantity))>=count($request->quantity))
        {
            
            for($i=0;$i<(count(json_decode($update->quantity)));$i++){

                if(in_array(json_decode($update->product_name)[$i], $request->product_name))
                {
                   
                    $j = array_search(json_decode($update->product_name)[$i],$request->product_name);

                    $barcode = ($request->bar_code)[$j];

                    $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->where('mrp_price',$request->mrp_price[$j])->get();

                    if($productattributedata->count()>0){

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);

                    }
                    else{

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->where('title',$request->product_name[$j])->first(); 
                      
                      
                    }
                    
                    $taxdata = get_Total_Tax($productgenuinedata);

                    array_push($unittax,$taxdata);

                    $gstdata = get_total_Gst($productgenuinedata);
                    array_push($unitgst,$gstdata);

                    $othertaxdata = get_others_tax($productgenuinedata);
                    array_push($unitothers,$othertaxdata);

                    $expiry = date('Y-m-d',strtotime(json_decode($update->exp_date)[$i]));

                    //delete old product mrp and expiry on change mrp price
                    if($request->product_name[$j]==json_decode($update->product_name)[$i] && $request->bar_code[$j]==json_decode($update->barcode)[$i] && $request->mrp_price[$j] != json_decode($update->mrp_price)[$i] && $request->expiry_date[$j] != json_decode($update->exp_date)[$i] ) {
                        
                        delprevmrpproduct(json_decode($update->product_name)[$i],json_decode($update->barcode)[$i],json_decode($update->mrp_price)[$i],$expiry);

                        $unitnewqty = floatval($request->quantity[$j]);

            
                        array_push($qtyarr,$unitnewqty);

                    }
                    else if($request->product_name[$j]==json_decode($update->product_name)[$i] && $request->bar_code[$j]==json_decode($update->barcode)[$i] && $request->mrp_price[$j] != json_decode($update->mrp_price)[$i]){

                        delprevmrpproduct(json_decode($update->product_name)[$i],json_decode($update->barcode)[$i],json_decode($update->mrp_price)[$i],$expiry);

                        $unitnewqty = floatval($request->quantity[$j]);

            
                        array_push($qtyarr,$unitnewqty);

                    }
                    //delete expiry on change expiry price
                    elseif ($request->product_name[$j]==json_decode($update->product_name)[$i] && $request->bar_code[$j]==json_decode($update->barcode)[$i] && $request->mrp_price[$j] == json_decode($update->mrp_price)[$i] && $request->expiry_date[$j]!=json_decode($update->exp_date)[$i]) {
                        

                        delprevexpproduct(json_decode($update->product_name)[$i],json_decode($update->barcode)[$i],json_decode($update->mrp_price)[$i],$expiry);

                    }else{


                        $unitnewqty = floatval(floatval($request->quantity[$j])-floatval(json_decode($update->quantity)[$i]));
            
                        array_push($qtyarr,$unitnewqty);

                    }
                    
                    $cost_price = number_format((floatval(($request->basic_price)[$j])*(floatval($taxdata)+100)/100),2);

                    array_push($cost_pricearr, $cost_price);
                    
                }
                else{

                    $expiry = date('Y-m-d',strtotime(json_decode($update->exp_date)[$i]));

                    delqtyproduct(json_decode($update->product_name)[$i],json_decode($update->barcode)[$i],json_decode($update->mrp_price)[$i],$expiry,floatval(json_decode($update->quantity)[$i]));
                    
                }
                
            }   
            
            // $productname = json_decode($update->product_name);
            // $expdate = json_decode($update->exp_date);
            // $mrp = json_decode($update->mrp_price);
            // $basic_price = json_decode($update->unit_price);
            // $hsn = json_decode($update->hsn_sac);
            // $svsell_price = json_decode($update->sv_sell_price);
            // $ebsell_price = json_decode($update->eb_sell_price);
            // $barcode_id = json_decode($update->barcode);
            // $tax = json_decode($update->tax);
            // $weight = json_decode($update->weight);
            // $unit = json_decode($update->unit);
            // $mfg = json_decode($update->mfg_date);

            $productname = $request->product_name;
            $expdate = $request->expiry_date;
            $mrp = $request->mrp_price;
            $basic_price = $request->basic_price;
            $hsn = $request->hsn;
            $svsell_price = $request->svsell_price;
            $ebsell_price = $request->ebsell_price;
            $barcode_id = $request->bar_code;
            $tax = $request->tax;
            $weight = $request->weight;
            $unit = $request->unit;
            $mfg = $request->mfg_date;

            getproductgrnwopoid($productname,$expdate,$qtyarr,$mrp,$basic_price,$hsn,$svsell_price,$ebsell_price,$barcode_id,$unittax,$weight,$unit,$mfg);

        
        }
        else{

            for($i=0;$i<(count($request->quantity));$i++){

                if (in_array($request->product_name[$i],json_decode($update->product_name))) {

                    $j = array_search($request->product_name[$i],json_decode($update->product_name));
                    
                    $barcode = ($request->bar_code)[$i];

                    $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->where('mrp_price',$request->mrp_price[$i])->get();


                    if($productattributedata->count()>0){

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);

                    }
                    else{

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->where('title',$request->product_name[$i])->first(); 
                      
                      
                    }
                    
                    $taxdata = get_Total_Tax($productgenuinedata);

                    array_push($unittax,$taxdata);

                    $gstdata = get_total_Gst($productgenuinedata);
                    array_push($unitgst,$gstdata);

                    $othertaxdata = get_others_tax($productgenuinedata);
                    array_push($unitothers,$othertaxdata);

                    $expiry = date('Y-m-d',strtotime(json_decode($update->exp_date)[$j]));
                    
                    //delete old product mrp and expiry on change mrp price
                    if ($request->product_name[$i]==json_decode($update->product_name)[$j] && $request->bar_code[$i]==json_decode($update->barcode)[$j] && $request->mrp_price[$i] != json_decode($update->mrp_price)[$j] && $request->expiry_date[$i] != json_decode($update->exp_date)[$j] ) {
                        
                        delprevmrpproduct(json_decode($update->product_name)[$j],json_decode($update->barcode)[$j],json_decode($update->mrp_price)[$j],$expiry);

                        $unitnewqty = floatval($request->quantity[$i]);

            
                        array_push($qtyarr,$unitnewqty);

                    }
                    else if($request->product_name[$i]==json_decode($update->product_name)[$j] && $request->bar_code[$i]==json_decode($update->barcode)[$j] && $request->mrp_price[$i] != json_decode($update->mrp_price)[$j]){

                        delprevmrpproduct(json_decode($update->product_name)[$j],json_decode($update->barcode)[$j],json_decode($update->mrp_price)[$j],$expiry);

                        $unitnewqty = floatval($request->quantity[$i]);

            
                        array_push($qtyarr,$unitnewqty);

                    }
                    //delete expiry on change expiry price
                    elseif ($request->product_name[$i]==json_decode($update->product_name)[$j] && $request->bar_code[$i]==json_decode($update->barcode)[$j] && $request->mrp_price[$i] == json_decode($update->mrp_price)[$j] && $request->expiry_date[$i]!=json_decode($update->exp_date)[$j]) {
                        

                        delprevexpproduct(json_decode($update->product_name)[$j],json_decode($update->barcode)[$j],json_decode($update->mrp_price)[$j],$expiry);
                        
                    }else{


                        $unitnewqty = floatval(floatval($request->quantity[$i])-floatval(json_decode($update->quantity)[$j]));
            
                        array_push($qtyarr,$unitnewqty);

                    }
                    

                    $cost_price = number_format((floatval(($request->basic_price)[$i])*(floatval($taxdata)+100)/100),2);

                    array_push($cost_pricearr, $cost_price);

                    
                }
                else{

                    $barcode = ($request->bar_code)[$i];

                    $productattributedata = ProductAttribute::with('productName')->where('barcode_id',$barcode)->where('mrp_price',$request->mrp_price[$i])->get();

                    if($productattributedata->count()>0){

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find(($productattributedata->first())->productName->id);

                    }
                    else{

                        $productgenuinedata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->where('title',$request->product_name[$i])->first(); 
                      
                      
                    }

                    
                    $taxdata = get_Total_Tax($productgenuinedata);

                    array_push($unittax,$taxdata);

                    $gstdata = get_total_Gst($productgenuinedata);
                    array_push($unitgst,$gstdata);

                    $othertaxdata = get_others_tax($productgenuinedata);
                    array_push($unitothers,$othertaxdata);

                    array_push($qtyarr,floatval($request->quantity[$i]));

                    $cost_price = number_format((floatval(($request->basic_price)[$i])*(floatval($taxdata)+100)/100),2);

                    array_push($cost_pricearr, $cost_price);

                }
                
            }


            $productname = $request->product_name;
            $expdate = $request->expiry_date;
            $mrp = $request->mrp_price;
            $basic_price = $request->basic_price;
            $hsn = $request->hsn;
            $svsell_price = $request->svsell_price;
            $ebsell_price = $request->ebsell_price;
            $barcode_id = $request->bar_code;
            $tax = $request->tax;
            $weight = $request->weight;
            $unit = $request->unit;
            $mfg = $request->mfg_date;

            

            getproductgrnwopoid($productname,$expdate,$qtyarr,$mrp,$basic_price,$hsn,$svsell_price,$ebsell_price,$barcode_id,$unittax,$weight,$unit,$mfg);

        }

        $update->supplier_id = $request->supplier_info;
        $update->carrier_name = $request->carrier_name;
        $update->invoice_number = $request->invoice_number;
        $update->invoice_date = $request->invoice_date;
        $update->invoice_value = $request->invoice_value;
        $update->delivery_date = $request->delivery_date;
        $update->barcode = json_encode($request->bar_code);
        $update->product_name = json_encode($request->product_name);
        $update->quantity = json_encode($request->quantity);
        $update->mrp_price = json_encode($request->mrp_price);
        $update->unit_price = json_encode($request->basic_price);
        $update->cost_price = json_encode($cost_pricearr);
        $update->sv_sell_price = json_encode($request->svsell_price);
        $update->eb_sell_price = json_encode($request->ebsell_price);
        $update->weight = json_encode($request->weight);
        $update->unit = json_encode($request->unit);
        $update->unit_tax = json_encode($unittax);
        $update->unit_gst = json_encode($unitgst);
        $update->unit_others = json_encode($unitothers);
        $update->sgst = json_encode($request->sgst);
        $update->cgst = json_encode($request->cgst);
        $update->igst = json_encode($request->igst);
        $update->ugst = json_encode($request->ugst);
        $update->cess = json_encode($request->cess);
        $update->apmc = json_encode($request->apmc);
        $update->hsn_sac = json_encode($request->hsn);
        //$update->discount = json_encode($request->discount);
        $update->mfg_date = json_encode($request->mfg_date);
        $update->exp_date = json_encode($request->expiry_date);
        $update->tax = json_encode($request->tax);
        $update->amount = json_encode($request->product_amount);
        $update->sub_total = $request->sub_total;
        $update->total_tax = $request->total_tax;
        $update->grand_total = $request->grand_total;

        $update->save();

        Session::flash('message', 'GRN Updated successfully.');         
        return redirect()->route('admin.grn_without_po');

    }

    public function GetGRNWithoutPO(Request $request){

        $grnwopodata = GRNWOPO::where('id',$request->grnwopo_id)->first();

        if ($grnwopodata != null) {
           
            return response()->json([

                'status'=>1,
                'grnwopodata'=>$grnwopodata

            ]);

        }else{

            return response()->json([

                'status'=>0,

            ]);
        }
    }


    public function destroy($id){

        GRNWOPO::find($id)->delete();
        Session::flash('message', 'GRN Without PO deleted successfully.');
        return redirect()->route('admin.grn_without_po');
    }

}
