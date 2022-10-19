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
                'status' => 'success',
                'status_code' => 200,
                'message' => 'Available Coupons, For the user.',
                'data' => $coupons
            ],200);
        }else{
            return response()->json([
                'status' => 'error',
                'status_code' => 404,
                'data' => [],
                'message' => 'Not Available Coupon, For the user.'
            ],404);
        }
    }
}
