<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserSubscriptionController extends Controller
{
    public function membershipPayment(Request $request):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'membership_id' => 'required',
            'membership_name' => 'required',
            'payment_id' => 'required',
            'payment_status' => 'required',
            'start_date'=>'required',
            'mrp' => 'required',
            'discount_price' => 'required',
            'paid_price' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' =>'error',
                'status_code' => 400,
                'message' => $validator->errors(),
                'data' => 'Parameters missing.',
            ],400);
        }

        $check_membership_plan = Subscription::find($request->membership_id);

        if(!$check_membership_plan){
            return response()->json([
                'status' =>'error',
                'status_code' => 404,
                'message' => 'Membership Not Found or Invalid Membership Id.',
                'data' => null,
            ],404);
        }

        DB::beginTransaction();
        try{
            $membership = UserSubscription::create([
                'user_id' => Auth::user()->id,
                'membership_id' => $request->membership_id,
                'membership_name' => $request->membership_name,
                'payment_id' => $request->payment_id,
                'payment_status' => $request->payment_status,
                'start_date'=>$request->start_date,
                'mrp' => $request->mrp,
                'discount_price' => $request->discount_price,
                'paid_price' => $request->paid_price,
            ]);

            User::where(['id' => Auth::user()->id])->update([
                'membership_status' => 1
            ]);

            DB::commit();
            return response()->json([
                'status' =>'success',
                'status_code' => 200,
                'message' => 'Membership successfully punched',
                'data' => $membership,
            ],200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'status' =>'error',
                'status_code' => 500,
                'message' => $e->getMessage(),
                'data' => $e->getTraceAsString(),
            ],500);
        }
    }
}
