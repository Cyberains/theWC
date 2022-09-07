<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSubscriptionController extends Controller
{
    public function purchase(Request $request):JsonResponse
    {
        $request->validate([
            'subscription_id' => 'required',
        ]);
        if(razorpay() === 200){
            $purchase = new UserSubscription();
            $purchase->user_id = $request->user()->id;
            $purchase->subscription_id = $request->subscription_id;
            $purchase->save();

            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $purchase,
                'message' => 'Subscription Successfully Done.',
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'status' => 1,
                'message' => 'Something Went Wrong. Try Again.',
            ]);
        }

    }

    public function getUserSubscription(Request $request): JsonResponse
    {
        $userSubscribed = UserSubscription::with(['getSubscriptionPlanDetails'])->where('user_id',$request->user()->id)->get();
        if ($userSubscribed->count() >0 ) {
            return response()->json([
                'code'=>200,
                'status'=>1,
                'data'=>$userSubscribed,
                'message'=>'User Subscribed Plans.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'Unsubscribed User.'
            ]);
        }
    }
}
