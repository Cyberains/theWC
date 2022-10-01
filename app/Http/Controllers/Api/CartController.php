<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function AddCart(Request $request): JsonResponse
    {
        $request->validate([
            'type'=> 'required'
        ]);

        if($request->type == 'product'){
            $cart = Cart::where('product_id', $request->product_id)->where('user_id',$request->user()->id)->first();
            if($cart){
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
            }else{
                Cart::create([
                    'user_id' => $request->user()->id,
                    'product_id'=> $request->product_id,
                    'type' => $request->type,
                    'quantity' => $request->quantity == null ? '1': $request->quantity,
                ]);
            }
        }
        if($request->type == 'service'){
            $cart = Cart::where('service_id', $request->service_id)->where('user_id',$request->user()->id)->first();
            if($cart){
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
            }else{
                Cart::create([
                    'user_id' => $request->user()->id,
                    'service_id'=> $request->service_id,
                    'type' => $request->type,
                    'quantity' => $request->quantity == null ? '1': $request->quantity,
                ]);
            }
        }

        return response()->json([
            'code' => 200,
            'status' => 1,
            'message' => $request->type == 'product' ? 'Product Added Successfully in your cart.':'Service Added Successfully in your cart.',
        ]);
    }

    public function AddCartQuantity(Request $request): JsonResponse
    {
        $request->validate([
            'id' => 'required',
        ]);
        $cart =Cart::where('id', $request->id)->where('user_id',$request->user()->id)->first();
        $cart->quantity = $cart->quantity + 1;
        $cart->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $cart,
            'message' => $request->type == 'product' ? 'Product Added Successfully in your cart.':'Service Added Successfully in your cart.',
        ]);
    }

    public function RemoveCart(Request $request): JsonResponse
    {
        $cartdata = Cart::where('id',$request->id)->where('user_id',$request->user()->id)->first();
        if ($cartdata != null) {
            $cartdata->delete();
            return response()->json([
                'code'=>200,
                'status'=>1,
                'message'=>'Product deleted successfully from your cart.'
            ]);
        }else{
            return response()->json([
                'code'=>422,
                'status'=>0,
                'message'=>'No Cart Data Exists.'
            ]);
        }
    }

    public function RemoveCartListAfterPayment($service_id): JsonResponse
    {
        $service_ids = explode(",", $service_id);
        $cartdata = Cart::whereIn('service_id',$service_ids)->get();
        if ($cartdata != null) {
            foreach ($cartdata as $cart){
                $cart->delete();
            }
            return response()->json([
                'code'=>200,
                'message'=>'Cart successfully Cleared.'
            ]);

        }else{
            return response()->json([
                'code'=>422,
                'status'=>0,
                'message'=>'No Cart Data Exists.'
            ]);
        }
    }

    function getCart(Request $request): JsonResponse
    {
        $cart = Cart::with(['getProduct','getService'])->where('user_id',$request->user()->id)->get();

        $product_sum = 0 ;
        $service_sum = 0 ;
        $product_discount_sum = 0 ;
        $service_discount_sum = 0 ;
        $product_final_sum = 0 ;
        $service_final_sum = 0 ;
        foreach ($cart as $item){
            if($item->product_id != null){
                $p = Product::where('id',$item->product_id)->first();
                $product_sum = $product_sum + $p->price;
                $product_discount_sum = $product_discount_sum + $p->discount;
                $product_final_sum = $product_final_sum + $p->discounted_price;
            }
            if($item->service_id != null){
                $p = Service::where('id',$item->service_id)->first();
                $service_sum = $service_sum + $p->price;
                $service_discount_sum = $service_discount_sum + $p->discount;
                $service_final_sum = $service_final_sum + $p->discounted_price;
            }
        }


        if ($cart->count() > 0 ) {
            return response()->json([
                'code'=>200,
                'status'=>1,
                'Total Amount' => $service_sum + $product_sum,
                'Total Discount' => $service_discount_sum + $product_discount_sum,
                'Total Final Amount' => $service_final_sum + $product_final_sum,
                'data'=>$cart,
                'message'=>'Cart Product Get Successfully.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'Cart is Empty.'
            ]);
        }
    }
}
