<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingService;
use App\Models\ProfessionalActiveStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request){
        $bookedTodayServices = Booking::with(['user'])->where(['professional_id' => $request->user()->id])->whereDate('date_slot', date('y-m-d'))->get();
        $totalBookedServices = Booking::where(['professional_id' => $request->user()->id])->count();
        $totalTodayBookedServices = Booking::where(['professional_id' => $request->user()->id])->whereDate('date_slot', date('y-m-d'))->count();
        $totalDoneServices = Booking::where(['professional_id' => $request->user()->id,'status' => 'done'])->count();
        $totalDoneServicesIds = Booking::where(['professional_id' => $request->user()->id,'status' => 'done'])->pluck('bookingId');
        $totalDoneServicesEarnings = BookingService::whereIn('booking_id',$totalDoneServicesIds)->sum('price');
        return view('professional.dashboard',compact([
            'bookedTodayServices',
            'totalBookedServices',
            'totalTodayBookedServices',
            'totalDoneServices',
            'totalDoneServicesEarnings'
        ]));
    }

    public function getBookingEarning(Request $request): array
    {
        $bookings = Booking::select(
            DB::raw("SUM(amount) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"))
            ->where(['professional_id' => $request->user()->id])
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labels = $bookings->keys();
        $data = $bookings->values();
        return compact(['labels','data']);
    }

    public function active(Request $request){
        $activate = ProfessionalActiveStatus::updateOrCreate(
            [
                'professional_id' => $request->user()->id,
            ],[
                'status' => $request->active == 'on'? 1: 0,
            ]
        );

        if($activate){
            return redirect()->route('professional.dashboard');
        }
    }
}
