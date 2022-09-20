<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingStatusController extends Controller
{
    public function index(Request $request){
        $bookings = Booking::select(\DB::raw('bookings.*'))->with(['user','service','professional'])->paginate(25);
        $currentpage = $bookings->currentPage();
        return view('admin.booking.index',compact(['bookings','currentpage']));
    }
    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $bookings=Booking::where('bookingId','LIKE','%'.$datas['query']."%")
                ->orWhere('status','LIKE','%'.$datas['query']."%")->paginate(25);
            $categorycount=Booking::where('bookingId','LIKE','%'.$datas['query']."%")
                ->orWhere('status','LIKE','%'.$datas['query']."%")->count();
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
}
