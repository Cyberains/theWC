<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $services = Service::where(['category_id'=> $request->category_id, 'sub_category_id' => $request->sub_category_id])
            ->with(['getCategory','getSubCategory'])->get();
        if ($services->count() >0 ) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $services,
                'message' => 'Service Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Service data Exists.'
            ]);
        }
    }

    public function newLaunched(): \Illuminate\Http\JsonResponse
    {
        $newLaunched = Service::where(['tag'=>'New'])->get();
        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $newLaunched,
            'message' => 'New Launched Services.',
        ]);
    }
}
