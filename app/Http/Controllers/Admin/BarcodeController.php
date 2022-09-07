<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Models\ProductAttribute;
use App\Models\BarcodeLabel;
use PDF;
use App\Models\Product;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdata = ProductAttribute::with('productName')->get()->groupBy('barcode_id');

        $offlinebarcode = BarcodeLabel::latest()->first();
        return view('admin.billing.barcode',compact(['productdata','offlinebarcode']));
    }

    public function getProduct(Request $request){

        if(!is_numeric($request->bar_code)){

            $productgenuinedata = Product::where('title',$request->bar_code)->first();

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
            

            return response()->json([

                    'success'=>1,
                    'productdata'=>$productdata

            ]);
        }
        else{

            return response()->json([

                'success'=>0,

            ]);

        }

    }

    public function barcodeGenerate($id){

        $barcodeupdatedata = BarcodeLabel::find($id)->update(['status'=>1]);

        $total_quantity = 0;

        if ($barcodeupdatedata) {
            
            $barcodedata = BarcodeLabel::find($id);

        }

        $size = array(0,0,70,226.9447);
        $pdf = PDF::loadView('admin.billing.barcodeslip',['barcodedata'=>$barcodedata])->setPaper($size, 'landscape');

        return $pdf->stream($barcodedata->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $form_data = [

            'product_name'=>json_encode($request->product_name),
            'barcode'=>json_encode($request->bar_code),
            'mrp_price'=>json_encode($request->mrp_price),
            'weight'=>json_encode($request->weight),
            'unit'=>json_encode($request->unit),
            'quantity'=>json_encode($request->quantity)
        ];

        BarcodeLabel::create($form_data);
        Session::flash('message', 'Barcode Submitted successfully.');

        return redirect()->route('admin.barcode_label');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
