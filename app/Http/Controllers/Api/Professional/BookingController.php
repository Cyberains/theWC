<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingService;
use App\Models\Booking\BookingServicePayment;
use App\Models\CouponCode;
use App\Models\Service;
use App\Models\User;
use App\Notifications\BookingNotification;
use App\Notifications\AdminBookingNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    /**
     * @param CartController $cartController
     */
    public function __construct(CartController $cartController)
    {
        $this->cartController = $cartController;
    }

    public function bookingService(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $service_id = explode(",", $request->service_id);
            $servicesAmount =  Service::whereIn('id',$service_id)->sum('discounted_price');
            if($servicesAmount < 500){
                return response()->json([
                    'message' => 'for Booking Service need to add at list 500$',
                ]);
            }

            $coupon= 0;
            if($request->coupon){
                $coupon = CouponCode::where(['coupon'=>$request->coupon])->first()->amount;
            }

            $form_booking = [
                'user_id' => $request->user()->id,
                'status' => 'pending',
                'user_service_address_id' => $request->address_id,
                'time_slot' => $request->time_slot,
                'date_slot' => $request->date_slot
            ];
            $booking = Booking::create($form_booking);
            $services =  Service::whereIn('id',$service_id)->get();
            $convenience_charge = 84;
            $tax = $convenience_charge * ( 18 / 100);

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
                    'convenience_charge' => $convenience_charge,
                    'tax' => $tax,
                    'totalServiceAmount' => $servicesAmount,
                    'offer' => $coupon,
                    'totalPayableAmount' => $servicesAmount + $convenience_charge + $tax - $coupon,
                    'data' => $booking,
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
            'payment_status' => 'required',
            'service_id' => 'required'
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
//                'paid_amount' => $request->paid_amount,
//                'due_amount' => $request->due_amount
            ];
            $booking = BookingServicePayment::create($form_data);

//            razorpay($request->payment_id,$request->paid_amount);

            if($request->payment_status == 'done'){
                $booking['professional'] = $this->service_assign_to_professionals($request->booking_id);

                if($booking['professional']){
                    $message=['title'=>"TWC WELL","description"=>"Vishnu".' has been done order with order id '."kdehfkef","type"=>'order','user_id' => $booking['professional'] ];

                    $userprofessional=User::where('id',$booking['professional'])->get();
                    Notification::send($userprofessional, new BookingNotification($message,$professional=$booking['professional']));

                    if($booking['professional']){
                        User::where('id',$booking['professional'])->update([
                            'is_free' => 1
                        ]);
                    }
                }

                $admin_message=['title'=>"TWC WELL","description"=>"New Booking".' has been done order with order id '.$request->booking_id,"type"=>'booking','role' => 'admin'];
                $admin=User::where('role','admin')->get();
                Notification::send($admin, new AdminBookingNotification($admin_message));

                $this->cartController->RemoveCartListAfterPayment($request->service_id);

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
        $bookingsIds = Booking::where(['user_id'=>$request->user()->id])->pluck('bookingId');
        $paymentDoneBookingIds = BookingServicePayment::whereIn('booking_id',$bookingsIds)->where('payment_status','done')->pluck('booking_id');
        $bookings['completed'] = Booking::with(['professional','bookingAddress','getAllBookedServicesList.bookingServiceBelongToService','getAllBookedServicesPayment'])->whereIn('bookingId',$paymentDoneBookingIds)->get();
        if($bookings['completed']->count() > 0){
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $bookings,
                'message' => 'Completed Booking History.',
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
            if(getProfessionalLogedStatus($professional->id)){
                if(getDistanceBtwUserAndProfessional($booking_detail->user_service_address_id,$professional->id) <= 30){
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
                    elseif (getProfessionalFreeStatus($professional->id) === false){
                        $ass = Booking::where('bookingId', $booking_id)->firstOrFail();
                        $ass->professional_id = null;
                        if($ass->save()){
                            return null;
                        }
                        break;
                    }
                }
            }
        }
    }
}
