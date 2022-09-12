<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Refer;
use App\Models\ReferralHistory;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ReferenceController extends Controller
{
    public function refer(){
        $refer = Refer::where(['status'=> 1])->latest()->first();
        if ($refer != null) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $refer,
                'message' => 'Refer Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Refer data Exists.'
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
            'refer_amount' => 'required'
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/refers');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/refers').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $category =new Refer();
        $category->title = $request->title;
        if($imageName != null){
            $category->image = url('public/images/refers/'.$imageName);
        }
        $category->refer_amount = $request->refer_amount;
        $category->description = $request->description;
        $category->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $category,
            'message' => 'Refer Created Successfully.',
        ]);
    }

    public function referHistory(Request $request): JsonResponse
    {
        $referrals = ReferralHistory::where(['user_id'=>$request->user()->id])->get();

        $su = 0;
        foreach ($referrals as $item){
            if($item->status != 0){
                $su = $su + $item->amount;
            }
        }

        if ($referrals != null) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'total referral amount' => $su,
                'data' => $referrals,
                'message' => 'Referral History Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Referral History data Exists.'
            ]);
        }
    }

    public function referGenerate(Request $request): JsonResponse
    {
        $request->validate([
            'referred_code' => 'required',
            'user_id' => 'required'
        ]);

        $referUserId = User::where(['refer_code'=>$request->referred_code])->first();
        if (!empty($referUserId)) {
            $ref = ReferralHistory::updateOrCreate([
                'user_id' => $request->user_id,
                'referred_user_id' => $referUserId->id
            ]);
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $ref,
                'message' => 'Referral Successfully Done.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'data' => [],
                'message' => 'Plz Enter valid Referral Code.'
            ]);
        }
    }
}
