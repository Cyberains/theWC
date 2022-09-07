<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceRatingController extends Controller
{
    public function serviceRating(Request $request){
        $ratings = Rating::with(['getService','getUser'])->where([
            'professional_id' => $request->user()->id,
            'status' => 1,
        ])->orderBy('created_at','DESC')->paginate(15);
        $current_page = $ratings->currentPage();
        return view('professional.rating.rating',compact(['ratings','current_page']));
    }
}
