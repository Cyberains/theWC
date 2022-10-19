<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use App\Models\Booking\BookingService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceHistoryController extends Controller
{
    public function serviceHistory(Request $request){
        $service_history = Booking::with(['user','bookingAddress'])->where(['professional_id'=>$request->user()->id])

            ->orderBy('created_at','DESC')
            ->paginate(15);
        $current_page = $service_history->currentPage();
        return view('professional.service.service_history',compact(['service_history','current_page']));
    }

    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $service_history=Booking::with(['user'])
                ->where(['professional_id'=>$request->user()->id])
                ->where('bookingId','LIKE','%'.$datas['query']."%")
                ->paginate(15);
            $service_count=Booking::with(['user','service'])->where(['professional_id'=>$request->user()->id])->where('bookingId','LIKE','%'.$datas['query']."%")->count();
            if($service_count){
                $current_page = $service_history->currentPage();
                return view('professional.service.pagination_service_history', compact(['service_history','current_page']))->render();
            }else{?>
                <tr>
                    <td colspan="4">No matching records found</td>
                </tr>
            <?php }
        }
    }


    public function updateStatus(Request $request){
        DB::beginTransaction();
        try {
            $bookingStatus = Booking::where(['bookingId' => $request->bookingId])->first();
            $bookingStatus->status = $request->status;
            $bookingStatus->save();
            $user = User::where('id',$request->user()->id)->first();
            if(getAllBookingStatusDone($user->id) == 0){
                $user->is_free = 0;
            }else {
                $user->is_free = 1;
            }
            DB::commit();

            if($user->save()){
                Alert::success('', 'Successfully Updated');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Alert::warning('', 'Something went wrong. Try again.');
            return redirect()->back();
        }
    }

    public function view(Request $request){
        $booking = Booking::where(['id' => $request->id])->first();
        $bookingServices = BookingService::with(['bookingServiceDetails'])->where('booking_id',$booking->bookingId)->get();
        $bookingServicesFinalAmount = BookingService::where('booking_id',$booking->bookingId)->sum('price');
        $html = '';
        foreach ($bookingServices as $bookingser){
            $html .= '<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>'.
                                                        '<td><img height="30px" src='.asset($bookingser->bookingServiceDetails->base_path.'/'.$bookingser->bookingServiceDetails->service_image).'></td>'.
                                                        '<td>'. $bookingser->bookingServiceDetails->title . '</td>'.
                                                        '<td>'. $bookingser->price . '</td>'.
                                                    '</tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        $html .= '<div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>'.
                                                        '<td>Total</td>'.
                                                        '<td>'. $bookingServicesFinalAmount . '</td>'.
                                                    '</tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
        echo $html;
    }


    public function serviceDone(Request $request){
        $service_done = Booking::with(['user'])->where(['professional_id'=>$request->user()->id,'status' => 'done'])
            ->orderBy('created_at','DESC')
            ->paginate(15);

        $current_page = $service_done->currentPage();
        return view('professional.service.service_done',compact(['service_done','current_page']));
    }

    public function servicePending(Request $request){
        $service_pending = Booking::with(['user','bookingAddress'])->where(['professional_id'=>$request->user()->id,'status' => 'pending'])
            ->orderBy('created_at','DESC')
            ->paginate(15);

        $current_page = $service_pending->currentPage();

        foreach(auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return view('professional.service.service_pending',compact(['service_pending','current_page']));
    }
}
