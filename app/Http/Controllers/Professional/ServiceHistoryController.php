<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ServiceHistoryController extends Controller
{
    public function serviceHistory(Request $request){
        $service_history = Booking::with(['user','service'])->where(['professional_id'=>$request->user()->id])

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
            $service_history=Booking::with(['user','service'])
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
}
