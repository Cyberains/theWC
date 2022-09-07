<?php

namespace App\Http\Controllers\Api\Professional;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function serviceRating(Request $request): JsonResponse
    {
        $request->validate([
            'service_id' => 'required',
            'professional_id' => 'required',
            'rating' => ['required', 'in:1,2,3,4,5'],
            'comment' => 'nullable',
            'status' => 'nullable'
        ]);

        $rating = new Rating();
        $rating->user_id = $request->user()->id;
        $rating->service_id = $request->service_id;
        $rating->professional_id = $request->professional_id;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;
        if($rating->save()){
            return response()->json([
                'data' => $rating,
                'message'=>'Thanks so much for sharing your experience with us. We hope to see you again soon.'
            ]);
        }
        return response()->json([
            'status' => 500,
            'message'=>'Can you try after some time. We have issue, hope to see you again soon.'
        ]);
    }
}
