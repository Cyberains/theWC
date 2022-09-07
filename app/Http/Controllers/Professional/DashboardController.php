<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('professional.dashboard');
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

    public function getBookingEarningDays(Request $request): array
    {
//        $bookings = Booking::select(
//            DB::raw('DATE(created_at,"%d") as date'),
//            DB::raw('SUM(amount) as count'))
//            ->where(['professional_id' => $request->user()->id])
//            ->whereDate('created_at', date('d'))
//            ->groupBy(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'))
//            ->pluck('count','date');

//        $bookings = Booking::select(
//            DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d") as date'),
//            DB::raw('SUM(amount) as count'))
//            ->whereDate('created_at', date('d'))
//            ->pluck('count','date');


//        ->whereBetween(
//        DB::raw('DATE_FORMAT(deliver_date,"%Y-%m")'),
//        [ $data['start_year_month'],$data['end_year_month']]
//    )
        $bookings = Booking::select(
            DB::raw("SUM(amount) as count"),
            DB::raw("DATE(created_at) as date"))
            ->where(['professional_id' => $request->user()->id])
            ->whereYear('created_at', date('M'))
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck('count', 'date');
        $labels = $bookings->keys();
        $data = $bookings->values();
        return compact(['labels','data']);
    }
}
