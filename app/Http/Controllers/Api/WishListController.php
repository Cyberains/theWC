<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function getWishList(Request $request): JsonResponse
    {
        $wishes = WishList::where('created_by',$request->user()->id)->get();
        if ($wishes->count() >0 ) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $wishes,
                'message' => 'Wish Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Wish data Exists.'
            ]);
        }
    }

    public function AddWish(Request $request): JsonResponse
    {
        $request->validate([
            'type'=> 'required'
        ]);
        $wish =new WishList();
        $wish->created_by = $request->user()->id;
        if($request->type == 'product'){
            $wish->product_id = $request->product_id;
        }else{
            $wish->service_id = $request->service_id;
        }
        $wish->type = $request->type;

        $wish->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $wish,
            'message' => $request->type == 'product' ? 'Product Added Successfully in your Wish-List.':'Service Added Successfully in your Wish-List.',
        ]);
    }

    public function RemoveWish(Request $request): JsonResponse
    {
        $wishData = WishList::where('id',$request->id)->where('created_by',$request->user()->id)->first();
        if ($wishData != null) {
            $wishData->delete();
            return response()->json([
                'code'=>200,
                'status'=>1,
                'message'=> $wishData->type == 'product' ? 'Product Removed Successfully from your Wish-List.':'Service Removed Successfully from your Wish-List.',
            ]);
        }else{
            return response()->json([
                'code'=>422,
                'status'=>0,
                'message'=>'No Wish-List Data Exists.'
            ]);
        }
    }
}
