<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use DNS1D;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdata = Product::get();
        $productattrdata = ProductAttribute::paginate(25);
        $currentpage = $productattrdata->currentPage();
        return view('admin.product.product_attribute',compact(['productattrdata','productdata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productdatas = Product::Where('title',$request->product)->first();
        $product_id=0;
        if($productdatas){
            $product_id=$productdatas->id;
        }
        else{

            return redirect()->route('admin.productatt')->withErrors(['error'=>'This product does not exists']);
        }
        if ($request->bar_code != '') {
            
            $new_productattr_id = $request->bar_code;
        }
        else{


            $productattrlastrow = ProductAttribute::where('barcode_id','LIKE','%CODE%')->orderBy('id','DESC')->first();

            if ($productattrlastrow!=null) {
                
                $last_productattr_id = $productattrlastrow->barcode_id;

                $product_id_array = explode('CODE',$last_productattr_id);

                $productattr_id_number = $product_id_array[1];

                $counter = str_pad((int)$productattr_id_number+1, 8 ,"0",STR_PAD_LEFT);

                $new_productattr_id = 'CODE'.$counter;
            }
            else{

                $new_productattr_id = 'CODE00000001';
            }



        }
       
       
        if ((ProductAttribute::where('product_id',$request->product)->get())->count()>0) {
            
            $active = 0;
        }
        else{

            $active = 1;

        }

        if ($request->cost_price != '' || $request->cost_price!=0) {

            $productdata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find($product_id);

            $tax  = get_Total_Tax($productdata);

            $basic_price = $request->cost_price*100/($tax+100);

        }
        else{

            $basic_price = null;
        }

        //dd($request->all());
        $form_data=[
            
            'product_id'=>$product_id,
            'barcode_id'=>$new_productattr_id,
            'unit'=>$request->unit,
            'unit_check'=>$request->unit_check,
            'mrp_price'=>$request->mrp_price,
            'selling_price'=>$request->selling_price,
            'eb_cost_price'=>$request->sv_selling_price,
            'membership_price'=>$request->membership_price,
            'basic_price'=>$basic_price,
            'cost_price'=>$request->cost_price,
            'is_active'=>$active,
          
        ];

        ProductAttribute::create($form_data);

        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Product Attribute added successfully.');
        return redirect()->route('admin.productatt');
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
    public function edit(Request $request)
    {
        $productattrrow = ProductAttribute::with('productName')->find($request->id);
       
        return response()->json([

            'status'=>1,
            'productdata' => $productattrrow,

        ]);

    
    }
  //search 
  public function search(Request $request){
    $productdata = Product::Where('title','LIKE','%'.$request->productname.'%')->get();

        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    
       $productdatas = Product::Where('title',$request->product)->first();
        $product_id=0;
        if($productdatas){
            $product_id=$productdatas->id;
        }
        else{

            return redirect()->route('admin.productatt')->withErrors(['error'=>'This product does not exists']);
        }
       
        $update = ProductAttribute::find($request->productattr_id);

        
        
        if ($request->product_code != '') {
                
            $update->product_code = $request->product_code;        

        }

        if ($request->cost_price != ''|| $request->cost_price!=0) {

            $productdata = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->find($product_id);


            $tax  = get_Total_Tax($productdata);

            $basic_price = $request->cost_price*100/($tax+100);
            
        }
        else{

            $basic_price = null;
        }

        $update->barcode_id = $request->bar_code;
        $update->product_id = $product_id;
        $update->unit = $request->unit;
        $update->unit_check = $request->unit_check;
        $update->mrp_price = $request->mrp_price;
        $update->selling_price = $request->selling_price;
        $update->eb_cost_price = $request->sv_selling_price;
        $update->basic_price = $basic_price;
        $update->cost_price = $request->cost_price;
        $update->membership_price = $request->membership_price;
        $update->save();

       Session::flash('message', 'Product Attribute updated successfully.');
       return redirect()->route('admin.productatt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductAttribute::find($id)->delete();
        Session::flash('message', 'Product Attribute deleted successfully.');
        return redirect()->route('admin.productatt');
    }

    public function toggle(Request $request){


        if (isset($request->status)&&isset($request->id)) {

            $productattrdata = ProductAttribute::find($request->id);
            $updatastatus = ProductAttribute::where('product_id',$productattrdata->product_id)->update(['is_active'=>0]);
            $update = ProductAttribute::where('id',$request->id)->update(['is_active'=>$request->status]);

            if ($update) {
                
                echo 1;
            }
            
        }
    }


    //filter function
    public function itemSearch(Request $request){
        if($request->ajax()){
          $datas=$request->all();
   
          $products = Product::where('title','LIKE','%'.$datas['query'].'%')->get();
          $pro=array();
          if($products){
            foreach ($products as $select) {
               $pro[]=$select->id;
            }
           }
        
         if($pro){
             
               $productattrdata=ProductAttribute::whereIn('product_id', $pro)->paginate(25);
               $productattrdatacount=ProductAttribute::whereIn('product_id', $pro)->count();
           }else{
            $productattrdata=ProductAttribute::where('mrp_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('selling_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('membership_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('basic_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('cost_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('barcode_id','LIKE','%'.$datas['query']."%")
                                                ->paginate(25);
            $productattrdatacount=ProductAttribute::where('mrp_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('selling_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('membership_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('basic_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('cost_price','LIKE','%'.$datas['query']."%")
                                                ->orWhere('barcode_id','LIKE','%'.$datas['query']."%")
                                                ->count();
           }
      
        if($productattrdatacount){
          $currentpage = $productattrdata->currentPage();
            return view('admin.product.paggination_product_attribute', compact(['productattrdata','currentpage']))->render();
        }else
        {?>
        <tr>
            <td colspan="10">No matching records found</td>
        </tr>
        <?php }
        }
    }
}