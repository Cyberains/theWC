<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ProductExpiry;
use App\Models\ProductAttribute;
use App\Models\Product;
use App\Imports\QuantityImport;
use App\Exports\QuantityExport;
use Excel;

class ProductExpiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productdata = Product::get();
        $productattrdata = ProductAttribute::get();
        $productexpirydata = ProductExpiry::paginate(25);

        $currentpage = $productexpirydata->currentPage();
        return view('admin.product.product_expiry',compact(['productattrdata','productdata','productexpirydata','currentpage']));
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

            return redirect()->route('admin.productexpiry')->withErrors(['error'=>'This product does not exists']);
        }



        if ((ProductExpiry::where('productattr_id',$request->product_attr)->get())->count()>0)
        {

            $productattrdata = ProductExpiry::where('productattr_id',$request->product_attr)->min('expiry_date');
            
            if ($productattrdata==null && $request->expiry_date==null) {
                
                $active = 0;

            }
            elseif($productattrdata==null && $request->expiry_date != null){

                ProductExpiry::where('productattr_id',$request->product_attr)->update(['on_active'=>0]);
                $active = 1;
            }
            else{

                if ($productattrdata>$request->expiry_date) {                    

                    ProductExpiry::where('productattr_id',$request->product_attr)->update(['on_active'=>0]);

                    $active=1;
                }
                else{

                    $active =0;
                }
            }
        }
        else{

            $active = 1;

        }

    
        $form_data=[
            
            'product_id'=>$product_id,
            'productattr_id'=>$request->product_attr,
            'aisle'=>$request->aisle,
            'rack'=>$request->rack,
            'self'=>$request->self,
            'quantity'=>$request->quantity,
            'mfg_date'=>$request->mfg_date,
            'expiry_date'=>$request->expiry_date,
            'on_active'=>$active,

        ];

        ProductExpiry::create($form_data);

        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Product Expiry added successfully.');
        return redirect()->route('admin.productexpiry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $productexpiryrow = ProductExpiry::with('productName')->find($request->id);
        echo $productexpiryrow;
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

            return redirect()->route('admin.productexpiry')->withErrors(['error'=>'This product does not exists']);
        }


        if ((ProductExpiry::where('productattr_id',$request->product_attr)->get())->count()>0)
        {

            $productattrdata = ProductExpiry::where('productattr_id',$request->product_attr)->min('expiry_date');
            
            if ($productattrdata==null && $request->expiry_date==null) {
                
                $active = 0;

            }
            elseif($productattrdata==null && $request->expiry_date != null){

                ProductExpiry::where('productattr_id',$request->product_attr)->update(['on_active'=>0]);
                $active = 1;
            }
            else{

                if ($productattrdata>$request->expiry_date) {                    

                    ProductExpiry::where('productattr_id',$request->product_attr)->update(['on_active'=>0]);

                    $active=1;
                }
                else{

                    $active =0;
                }
            }
        }
        else{

            $active = 1;

        }
       
        $update = ProductExpiry::find($request->productexpiry_id);
        $update->product_id = $product_id;
        $update->productattr_id = $request->product_attr;
        $update->aisle = $request->aisle;
        $update->rack = $request->rack;
        $update->shelf = $request->self;
        $update->quantity = intval($request->quantity);
        $update->mfg_date = $request->mfg_date;
        $update->expiry_date = $request->expiry_date;
        $update->on_active = $active;
        $update->save();

       Session::flash('message', 'Product Expiry updated successfully.');
       return redirect()->route('admin.productexpiry');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        ProductExpiry::find($id)->delete();
        Session::flash('message', 'Product Expiry deleted successfully.');
        return redirect()->route('admin.productexpiry');
    }

    public function GetProductAttribute(Request $request){

        $productdata = Product::where('title',$request->id)->first();

        //This Controller using by product_expiry.blade.php

        if ($productdata!=null) {
            
            $productattrdata = ProductAttribute::where('product_id',$productdata->id)->get();
            echo $productattrdata;
            
        }
        else{

            echo 1;
        }

    }

    public function GetProductAttributeId(Request $request){

        $productdata = Product::where('id',$request->id)->first();

        //This Controller using by product_expiry.blade.php

        if ($productdata!=null) {
            
            $productattrdata = ProductAttribute::where('product_id',$productdata->id)->get();
            echo $productattrdata;
            
        }
        else{

            echo 1;
        }

    }

    public function toggle(Request $request){


        if (isset($request->status)&&isset($request->id)) {

            $productexpirydata = ProductExpiry::find($request->id);
            
            // $check = ProductExpiry::where('productattr_id',$productexpirydata->productattr_id)->get();

            // if ($check->count()>1) {
                
            //     $updatastatus = ProductExpiry::where('productattr_id',$productexpirydata->productattr_id)->update(['is_active'=>0]);
            // }

            $update = ProductExpiry::where('id',$request->id)->update(['is_active'=>$request->status]);

            if ($update) {
                
                echo 1;
            }
            
        }
    }

    public function toggleOnline(Request $request){


        if (isset($request->status)&&isset($request->id)) {

            $productexpirydata = ProductExpiry::find($request->id);
            
            $check = ProductExpiry::where('productattr_id',$productexpirydata->productattr_id)->get();

            if ($check->count()>1) {
                
                $updatastatus = ProductExpiry::where('productattr_id',$productexpirydata->productattr_id)->update(['on_active'=>0]);
            }

            $update = ProductExpiry::where('id',$request->id)->update(['on_active'=>$request->status]);

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
            $productattr = ProductAttribute::where('mrp_price','LIKE','%'.$datas['query'].'%')->get();
            $pro=array();
            $proattr=array();
            $productexpirycount=0;
            if($products){
                foreach ($products as $select) {
                    $pro[]=$select->id;
                }
            }
            if($productattr){
                foreach ($productattr as $select) {
                    $proattr[]=$select->id;
                }
            }
            if($pro){
                $productexpirydata=ProductExpiry::whereIn('product_id', $pro)
                                                ->paginate(25);
                $productexpirycount=ProductExpiry::whereIn('product_id', $pro)
                                                    ->count();
            }
            elseif(!empty($proattr)){
                $productexpirydata=ProductExpiry::whereIn('productattr_id', $proattr)
                                                ->paginate(25);
                $productexpirycount=ProductExpiry::whereIn('productattr_id', $proattr)
                                                    ->count();
            }else{
            $productexpirydata=ProductExpiry::where('aisle','LIKE','%'.$datas['query']."%")
                                            ->orWhere('rack','LIKE','%'.$datas['query']."%")
                                            ->orWhere('shelf','LIKE','%'.$datas['query']."%")
                                            ->orWhere('quantity','LIKE','%'.$datas['query']."%")
                                            ->orWhere('mfg_date','LIKE','%'.$datas['query']."%")
                                            ->orWhere('expiry_date','LIKE','%'.$datas['query']."%")
                                            ->paginate(25);
            $productexpirycount=ProductExpiry::where('aisle','LIKE','%'.$datas['query']."%")
                                            ->orWhere('rack','LIKE','%'.$datas['query']."%")
                                            ->orWhere('shelf','LIKE','%'.$datas['query']."%")
                                            ->orWhere('quantity','LIKE','%'.$datas['query']."%")
                                            ->orWhere('mfg_date','LIKE','%'.$datas['query']."%")
                                            ->orWhere('expiry_date','LIKE','%'.$datas['query']."%")
                                            ->count();
            }
          
      
            if($productexpirycount>0){

                $currentpage = $productexpirydata->currentPage();
                return view('admin.product.paggination_product_expiry', compact(['productexpirydata','currentpage']))->render();
            }else
            {?>
            <tr>
                <td colspan="12">No matching records found</td>
            </tr>
            <?php }
        }
    }

    public function import(){

        return view('admin.product.quantity_update_import');

    }

    public function importCSV(Request $request){

        $request->validate([

           'import_file' => 'required|mimes:xlsx,txt'

       ]);

       try{

            Excel::import(new QuantityImport,request()->file('import_file'));
        }catch ( ValidationException $e ){

            return response()->json(['success'=>'errorList','message'=> $e->errors()]);
        }
                  
        

       Session::flash('message', 'Products Quantity Updated Successfully.');
       return redirect()->route('admin.productexpiry');
    }

    public function downloadCSVSample(){

        return Excel::download(new QuantityExport, 'quantity_sheet'.time().'.xlsx');
    }
}