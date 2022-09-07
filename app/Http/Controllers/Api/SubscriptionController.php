<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function getSubscriptionPlanList(Request $request): JsonResponse
    {
        $subscription_plans = Subscription::where('status',1)->get();
        if ($subscription_plans->count() >0 ) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $subscription_plans,
                'message' => 'Subscription Plans Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Subscription Plans Exists.'
            ]);
        }
    }
}
