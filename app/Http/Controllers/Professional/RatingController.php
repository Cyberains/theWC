<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Rating\Professional;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function professionalRating(Request $request){
        $ratings = Professional::with(['getUser'])->where([
            'professional_id' => $request->user()->id,
            'status' => 1,
        ])->orderBy('created_at','DESC')->paginate(15);
        $current_page = $ratings->currentPage();
        return view('professional.rating.rating',compact(['ratings','current_page']));
    }
}
