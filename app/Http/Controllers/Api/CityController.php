<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorldCity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cities(): JsonResponse
    {
        $cities = WorldCity::all();
        if ($cities != null) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $cities,
                'message' => 'Cities Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Cities data Exists.'
            ]);
        }
    }
}
