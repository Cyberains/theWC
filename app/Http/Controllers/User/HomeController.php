<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Offer;
use Hashids;
use App\Mail\ContactMail;
use Mail;


class HomeController extends Controller
{	

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        
    }

    public function index(){

    	$topcategory = Category::where('top_category',1)->get();
    	$topbrand = Brand::where('top_brand',1)->get();
        return view('user.home',compact(['topcategory','topbrand']));
    	
    }

    public function Category($category,$id){

    	$categoryid = Hashids::decode($id);
        $categorydata = Category::with('subCategoryName')->get(['id','title']);
    
    	$p = Product::with('productImage')->with('productExpiryOnline')->where('category_id',$categoryid[0])->where('is_active',1);

        $productdata = $p->get();

        $branddata = $p->with('brandName')->get()->groupBy('brand_id');

        return view('user.product_category',compact(['productdata','categorydata','branddata']));
    }

    public function Brand($brand,$id){

    	$brandid = Hashids::decode($id);
    	$branddata = Product::where('brand_id',$brandid[0])->get();
    	
    }

    public function Quickview($id){

        $productdata = Product::with('categoryName')->with('ManufacturerName')->with('SubCategoryName')->with('productExpiryOnline')->with('productImage')->with('brandName')->find($id);

        return response()->json([

            'data'=>view('user.layout.quick_view', compact('productdata'))->render()
        ]);


    }

    public function ProductView($product,$id){

        $productdata = Product::with('categoryName')->with('ManufacturerName')->with('SubCategoryName')->with('productExpiryOnline')->with('productImage')->with('brandName')->find(Hashids::decode($id)[0]);

        return view('user.product_view',compact('productdata'));

    }

    public function ContactMail(Request $request){


        $data = [];
        $data['name'] = $request->name;
        $data['phone'] = $request->telNo; 
        $data['email'] = $request->email; 
        $data['message'] = $request->message; 
        $data['subject'] = 'Support'; 

        Mail::to("support@earlybasket.com")->send(new ContactMail($data));

        return redirect()->back()->with('message','Successfully Sent Email');

        
    }

    public function Offer(){

        $offerdata = Offer::with('productNameImage')->with('productattrName')->where('end_date','>=',date('Y-m-d H:i:s',strtotime(now())))->where('start_date','<=',date('Y-m-d H:i:s',strtotime(now())))->get();

        return view('spa.today_offer',compact(['offerdata']));
    }
}
