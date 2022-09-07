<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Auth;
use App\Models\Cart;

class CartController extends Controller
{

    public function Cart(Request $request){

        if (Auth::check()) {
            
            if (session()->has('session_id')) {
                
                $session_id = Session::get('session_id');
                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->orWhere('session_id',$session_id)->get();
            }
            else{

                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->get();
            }
            

        }
        else{

            $session_id = Session::get('session_id');
            $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('session_id',$session_id)->get();

        }

        return view('user.cart',compact(['cart']));

    }

    public function AddtoCart(Request $request){
       
    	$product = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->with('ProductImage')->with('productExpiryOnline')->findOrFail($request->id);

    	$selling_price = $product->productExpiryOnline->first()->productAttr->selling_price;
    	$weight = $product->productExpiryOnline->first()->productAttr->unit;

        $productattr_id = $product->productExpiryOnline->first()->productAttr->id;
        $product_id = $request->id;
        $productexpiry_id = $product->productExpiryOnline->first()->id;

        if (Auth::check()) {

            $cartdata = Cart::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();

            if ($cartdata==null) {

                if ($request->has('quantity')) {
                    
                    $qty = intval($request->quantity);
                }
                else{

                    $qty = 1;
                }

                $tax_price = floatval($selling_price)*get_Total_Tax($product)/100*$qty;
                $total_price = floatval($selling_price)*$qty;

                
                $form_data = [

                    'user_id'=> Auth::user()->id,
                    'product_id' => $request->id,
                    'productattr_id'=> $productattr_id,
                    'productexpiry_id'=> $productexpiry_id, 
                    'quantity' => $qty,
                    'total_price' => $total_price,
                    'total_tax'=>$tax_price,

                ];

                $cartsave = Cart::create($form_data);

            }
            else{

                if ($request->has('quantity')) {
                    
                    $qty = $cartdata->quantity+intval($request->quantity);
                }
                else{

                    $qty = $cartdata->quantity+1;                    
                }


                $tax_price = floatval($selling_price)*get_Total_Tax($product)/100*$qty;
                $total_price = floatval($selling_price)*$qty;

                $form_data = [

                    'quantity' => $qty,
                    'total_price' => $total_price,
                    'total_tax'=>$tax_price,

                ]; 

                Cart::where('id',$cartdata->id)->update($form_data);

            }

        }
        else{

            if (session()->has('session_id')) {
                
                $session_id = Session::get('session_id');
            }
            else{

                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            $cartdata = Cart::where('session_id',$session_id)->where('product_id',$request->id)->first();

            if ($cartdata == null) {
                
                if ($request->has('quantity')) {
                    
                    $qty = intval($request->quantity);
                }
                else{

                    $qty = 1;
                }
                $tax_price = floatval($selling_price)*get_Total_Tax($product)/100*$qty;
                $total_price = floatval($selling_price)*$qty;

                
                $form_data = [

                    'session_id'=> $session_id,
                    'product_id' => $request->id,
                    'productattr_id'=> $productattr_id,
                    'productexpiry_id'=> $productexpiry_id, 
                    'quantity' => $qty,
                    'total_price' => $total_price,
                    'total_tax'=>$tax_price,

                ];

                $cartsave = Cart::create($form_data);

            }
            else{

                if ($request->has('quantity')) {
                    
                    $qty = $cartdata->quantity+intval($request->quantity);
                }
                else{

                    $qty = $cartdata->quantity+1;                    
                }

                $tax_price = floatval($selling_price)*get_Total_Tax($product)/100*$qty;
                $total_price = floatval($selling_price)*$qty;

                $form_data = [

                    'quantity' => $qty,
                    'total_price' => $total_price,
                    'total_tax'=>$tax_price,

                ]; 

                Cart::where('id',$cartdata->id)->update($form_data);

            }

        }

	    return response()->json([

            'error'=>false,
            'message'=>'Successfully Addded Product in Cart.',
            'url'=>route('user.get_cart'),
            'data'=>[

                'next_url'=>0,
            ],
            'cart'=>$cartdata

        ]);

    }

    public function GetCart(){

    	if (Auth::check()) {
            
            if (session()->has('session_id')) {
                
                $session_id = Session::get('session_id');
                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->orWhere('session_id',$session_id)->get();
            }
            else{

                $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('user_id',Auth::user()->id)->get();
            }

        }
        else{

            $session_id = Session::get('session_id');
            $cart = Cart::with(['productName','productAttr','productExpiryName'])->where('session_id',$session_id)->get();

        }

    	return response()->json([

    		'error'=>false,
    		'data'=>[

    			'html'=>view('user.layout.cart',compact(['cart']))->render(),
                'cartpage'=>view('user.layout.cart_page',compact(['cart']))->render(),
    			'count'=>$cart->sum('quantity'),
    		],
            'item'=>count($cart),

    	]);
    }

    public function AjaxQtyCart(Request $request){

        $cartdata = Cart::with(['productName','productAttr','productExpiryName'])->where('id',$request->id)->first();

        $selling_price = $cartdata->productAttr->selling_price;

        $product = Product::with(['sgstName','cgstName','igstName','ugstName','cessName','apmcName'])->with('ProductImage')->with('productExpiryOnline')->findOrFail($cartdata->product_id);

        $qty = intval($request->quantity);

        $tax_price = floatval($selling_price)*get_Total_Tax($product)/100*$qty;
        $total_price = floatval($selling_price)*$qty;

        $form_data =[

            'quantity'=>$qty,
            'total_tax'=>$tax_price,
            'total_price'=>$total_price,
        ];

        Cart::where('id',$request->id)->update($form_data);

        
        return response()->json([

            'error'=>false,
            'url'=>route('user.get_cart_page'),
            'message'=>'Cart Updated Successfully'
        ]);

    }

    public function AjaxRemoveCart($id){

        $cartdata = Cart::find($id);
        $cartdata->delete();

        return response()->json([

            'error'=>false,
            'message'=>'Product Removed Successfully',
            'url'=>route('user.get_cart'),

        ]);

    }

    public function RemoveCart($id){

        $cartdata = Cart::find($id);
        $cartdata->delete();

        return redirect()->route('user.cart');

    }
}
