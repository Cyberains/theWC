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
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingService(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $service_id = explode(",", $request->service_id);
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
            DB::commit();
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
        catch( \Exception $e )
        {
            DB::rollback();
            return response()->json([
                'code' => 200,
                'status' => 1,
                'message' => 'Error:'.$e,
            ]);
        }
    }

    public function bookingPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'payment_id' => 'required',
            'payment_status' => 'required'
        ]);
        $check_booking =  BookingServicePayment::where(['booking_id' => $request->booking_id,'payment_status' => 'done'])->first(['booking_id','payment_id','payment_status']);
        if($check_booking){
            return response()->json([
                'status' => 200,
                'data' => $check_booking,
                'message' => 'Your payment is already done.',
            ]);
        }
        DB::beginTransaction();
        try {
            $form_data = [
                'booking_id' => $request->booking_id,
                'payment_id' => $request->payment_id,
                'payment_status' => $request->payment_status,
                'settlement_date' => $request->settlement_date,
                'settlement_status' => $request->settlement_status,
            ];
            $booking = BookingServicePayment::create($form_data);
            if($request->payment_status == 'done'){
                $booking['professional'] = $this->service_assign_to_professionals($request->booking_id);
                if($booking['professional']){
                    User::where('id',$booking['professional'])->update([
                        'is_free' => 1
                    ]);
                }
            }
            DB::commit();
            if($booking){
                return response()->json([
                    'code' => 200,
                    'status' => 1,
                    'data' => $booking,
                    'message' => 'Booking Done.',
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => 200,
                'status' => 1,
                'message' => 'Error:'.$e,
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

    private function service_assign_to_professionals($booking_id){
        $booking_detail = Booking::where(['bookingId' => $booking_id])->first();
        $findProfessionals = User::where(['role' => 'Professional','is_active' => 1])->orderBy('paid_role','DESC')->get();
        foreach ($findProfessionals as $professional){
            if(getDistanceBtwUserAndProfessional($booking_detail->user_service_address_id,$professional->id) <= 2170){
                if($professional->paid_role == 1 && getProfessionalsRating($professional->id) >= 3 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
                elseif ($professional->paid_role == 1 && getProfessionalsRating($professional->id) >= 2 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
                elseif ($professional->paid_role == 1 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalsRating($professional->id) >= 3 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalsRating($professional->id) >= 2 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
                elseif ($professional->paid_role == 0 && getProfessionalFreeStatus($professional->id) === true){
                    $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                    $ass->professional_id = $professional->id;
                    if($ass->save()){
                        return $professional->id;
                    }
                    break;
                }
            }
        }
    }
}
