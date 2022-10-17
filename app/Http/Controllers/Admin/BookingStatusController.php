<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking\BookingServicePayment;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingStatusController extends Controller
{
    public function index(Request $request){
        $bookings = Booking::with(['user','bookingAddress','service','professional','servicePaymentStatus'])->paginate(10);
        foreach(auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        $currentpage = $bookings->currentPage();
        return view('admin.booking.index',compact(['bookings','currentpage']));
    }
    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $paymentDoneBookingIds = BookingServicePayment::where('payment_status','done')->pluck('booking_id');
            $bookings=Booking::where('bookingId','LIKE','%'.$datas['query']."%")
                ->orWhere('status','LIKE','%'.$datas['query']."%")->whereIn('bookingId',$paymentDoneBookingIds)->paginate(25);
            $categorycount=Booking::where('bookingId','LIKE','%'.$datas['query']."%")
                ->orWhere('status','LIKE','%'.$datas['query']."%")->whereIn('bookingId',$paymentDoneBookingIds)->count();
            if($categorycount){
                $currentpage = $bookings->currentPage();
                return view('admin.booking.paggination_booking', compact(['bookings','currentpage']))->render();
            }else{?>
                <tr>
                    <td colspan="4">No matching records found</td>
                </tr>
            <?php }
        }
    }

    public function assignProfessional(Request $request){
        $booking = Booking::where(['bookingId'=>$request->booking_id])->first();
        $booking->professional_id = $request->professional_id;
        if($booking->save()){
            $user = User::where('id',$request->professional_id)->first();
            $user->is_free = 1;
            $user->save();
            return redirect()->route('admin.bookings');
        }
    }

     public function getLocation(Request $request){
        $booking = Booking::where(['bookingId'=>$request->booking_id])->first();
        $users = User::with(['getDefaultAddress'])->where('id',$booking['user_id'])->first();
        $findProfessionals = User::with(['professionalAddress'])->where(['role' => 'Professional','is_active' => 1])->get();
        if(!empty($users->getDefaultAddress['latitude']) && !empty($users->getDefaultAddress['longitude'])){
            $latitude=$users->getDefaultAddress['latitude'];
            $longitude=$users->getDefaultAddress['longitude'];
            $matchingprofisionaldistance=[];
            foreach ($findProfessionals as $professional){
                $data=$this->latitudelang($professional);
                if(!empty($data['latitude']) && !empty($data['longitude'])){
                    $distances=getDistance($latitude, $longitude, $data['latitude'], $data['longitude'],'K');
                    if($distances<='30'){
                        $push=[
                            'latitude'=>$data['latitude'],
                            'longitude'=>$data['longitude'],
                            'title'=>$professional['name'],
                             'id'=>$professional['id'],
                        ];
                        array_push($matchingprofisionaldistance,$push);
                    }
                }
            }
        }
        else{
            return redirect('admin/bookings');
        }
        return view('admin.booking.getlocation',compact('users','matchingprofisionaldistance'));
    }

  public function latitudelang($details){
    if(!empty($details->professionalAddress)){
        $data['latitude']=$details->professionalAddress->latitude;
        $data['longitude']=$details->professionalAddress->longitude;
        return $data;
    }
  }


}
