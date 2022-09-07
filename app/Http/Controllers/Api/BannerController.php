<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function getBanner(): \Illuminate\Http\JsonResponse
    {
        $banners = Banner::where(['status' => 1])->orderBy('priority', 'asc')->get();
        if($banners->count() > 0){
            return response()->json([
                'status'=>200,
                'data'=>$banners,
                'message'=>'Banner Successfully Received'
            ]);
        }else{
            return response()->json([
                'status'=>403,
                'data'=>[],
                'message'=>'Banner is Not Available.'
            ]);
        }
    }
}
