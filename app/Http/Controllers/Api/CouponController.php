<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CouponCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function getCoupon(): JsonResponse
    {
        $coupons = CouponCode::whereDate('expire_date','>=' ,date('Y-m-d'))->get();
        if($coupons->count() > 0){
            return response()->json([
                'status' => 200,
                'data' => $coupons,
                'message' => 'Available Coupons, For the user.'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'data' => [],
                'message' => 'Not Available Coupon, For the user.'
            ]);
        }
    }
}
