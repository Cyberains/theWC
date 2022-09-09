<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        $service_id = $request->service_id;
        $user_id = $request->user()->id;

        $serviceDetail =  Service::where(['id' => $service_id])->first();
        $userDetail = User::where('id',$user_id)->first();

        $servicePrice = $serviceDetail->discounted_price;
        $userName = $userDetail->name;

        $data['name'] = $userName;
        $data['service_name'] = $serviceDetail->title;
        $data['amount'] = $servicePrice;

        if(razorpay() == 200){
            $this->service_assign_to_professionals($service_id,$user_id,$servicePrice);
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $data,
                'message' => 'Booking Done.',
            ]);
        }
    }

    public function bookingHistory(Request $request): JsonResponse
    {
        $bookings = Booking::where(['user_id'=>$request->user()->id])->get();
        if($bookings->count() > 0){
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $bookings,
                'message' => 'Booking History.',
            ]);
        }else{
            return response()->json([
                'code' => 404,
                'status' => 1,
                'message' => 'No Booking History.',
            ]);
        }
    }

    private function service_assign_to_professionals($service_id,$user_id,$servicePrice){
        $findProfessionals = User::where(['role' => 'Professional','is_active' => 1])->get();
        foreach ($findProfessionals as $professional){
            if($professional->paid_role == 1 && $professional->ranking >= 4){
                Booking::create([
                    'user_id' => $user_id,
                    'service_id' => $service_id,
                    'amount' => $servicePrice,
                    'professional_id' => $professional->id
                ]);
            }else{
                Booking::create([
                    'user_id' => $user_id,
                    'service_id' => $service_id,
                    'amount' => $servicePrice,
                    'professional_id' => $professional->id
                ]);
            }
        }

    }
}
