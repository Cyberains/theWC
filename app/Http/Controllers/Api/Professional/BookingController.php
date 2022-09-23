<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingService;
use App\Models\Booking\BookingServicePayment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function bookingService(Request $request)
    {
        $service_id = $request->service_id;

        $form_booking = [
            'user_id' => $request->user()->id,
            'status' => 'pending',
            'user_service_address_id' => $request->address_id,
            'time_slot' => $request->time_slot,
            'date_slot' => $request->date_slot
        ];
        $booking = Booking::create($form_booking);

        $services =  Service::whereIn('id',$service_id)->get();
        $servicesAmount =  Service::whereIn('id',$service_id)->sum('discounted_price');

        foreach ($services as $service){
            BookingService::create([
                'booking_id' => $booking->bookingId,
                'service_id' => $service->id,
                'mrp' => $service->price,
                'discount'=> $service->discount,
                'price' => $service->discounted_price
            ]);
        }
        if($booking){
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $booking,
                'totalAmount' => $servicesAmount,
                'message' => 'Now go on Payment Page.',
            ]);
        }
    }

    public function bookingPayment(Request $request){
        $form_data = [
            'booking_id' => $request->booking_id,
            'payment_id' => $request->payment_id,
            'payment_status' => $request->payment_status,
            'settlement_date' => $request->settlement_date,
            'settlement_status' => $request->settlement_status,
        ];
        $booking = BookingServicePayment::create($form_data);
        if($booking){
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $booking,
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

    private function service_assign_to_professionals($service_id,$user_id,$servicePrice,$address_id){
        $findProfessionals = User::where(['role' => 'Professional','is_active' => 1])->orderBy('paid_role','DESC')->get();
        foreach ($findProfessionals as $professional){
            if(getDistanceBtwUserAndProfessional($address_id,$professional->id) <= 10){
                if($professional->paid_role == 1 && getProfessionalsRating($professional->id) >= 3 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif ($professional->paid_role == 1 && getProfessionalsRating($professional->id) >= 2 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif ($professional->paid_role == 1 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalsRating($professional->id) >= 3 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalsRating($professional->id) >= 2 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalFreeStatus($professional->id) === true){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'professional_id' => $professional->id,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
                elseif (getProfessionalFreeStatus($professional->id) === false){
                    Booking::create([
                        'user_id' => $user_id,
                        'service_id' => $service_id,
                        'amount' => $servicePrice,
                        'user_service_address_id' => $address_id
                    ]);
                    break;
                }
            }
        }
    }
}
