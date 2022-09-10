<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OfferOfTheDay;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OfferOfTheDayController extends Controller
{
    public function offerOfTheDay(): JsonResponse
    {
        $OfferOfTheDay = OfferOfTheDay::where(['is_active'=> 1])
            ->whereDate('e_time','>=' ,date('Y-m-d'))
            ->whereDate('s_time','>=' ,date('Y-m-d'))->get();
        if ($OfferOfTheDay->count() > 0) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $OfferOfTheDay,
                'message' => 'OfferOfTheDay Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No OfferOfTheDay data Exists.'
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'offer_value' => 'required',
            'offer_value_type' => 'required',
            'type' => 'required',
            'min_price' => 'required',
            's_time' => 'required',
            'e_time' => 'required',
            'is_active' => 'required'
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/offerOfTheDay');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/offerOfTheDay').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $OfferOfTheDay =new OfferOfTheDay();
        $OfferOfTheDay->name = $request->name;
        $OfferOfTheDay->base_path = url('public/images/offerOfTheDay/');
        $OfferOfTheDay->image = $imageName;
        $OfferOfTheDay->terms_and_conditions = $request->terms_and_conditions;
        $OfferOfTheDay->offer_value = $request->offer_value;
        $OfferOfTheDay->offer_value_type = $request->offer_value_type;
        $OfferOfTheDay->type = $request->type;
        $OfferOfTheDay->min_price = $request->min_price;
        $OfferOfTheDay->s_time = $request->s_time;
        $OfferOfTheDay->e_time = $request->e_time;
        $OfferOfTheDay->is_active = $request->is_active;
        $OfferOfTheDay->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $OfferOfTheDay,
            'message' => 'Offer Of The Day Created Successfully.',
        ]);
    }
}
