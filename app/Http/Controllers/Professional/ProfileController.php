<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function profile(Request $request){
        $user = User::with(['getDefaultAddress'])->where(['id' => $request->user()->id])->first();
        $user['rating'] = getProfessionalsRating($request->user()->id);
        $addr = $user['getDefaultAddress'];
        $user['def_address'] = @@$addr['house_no'] .' '. @@$addr['area'] .' '. @@$addr['city'].' '. @@$addr['state'].' '. @@$addr['zipcode'];
        return view('professional.profile.profile',compact(['user']));
    }

    public function updateAvatar(Request $request){
        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/avatar');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/avatar').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $user =User::where(['id'=> $request->user()->id])->first();

        if( File::exists(public_path('images/avatar/'.$user->upload_photo)) ) {
            File::delete(public_path('images/avatar/'.$user->upload_photo));
        }

        $user->upload_photo = url('public/images/avatar/'.$imageName);

        if($user->save()){
            Alert::success('', 'Successfully Updated');
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required',
            'experience' => 'required',
            'working_location' => 'required',
            'qualification' => 'required'
        ]);
        $user = User::where(['id'=> $request->user()->id])->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->experience = $request->experience;
        $user->working_location = $request->working_location;
        $user->qualification = $request->qualification;
        if($user->save()){
            Alert::success('', 'Successfully Updated');
            return redirect()->back();
        }
    }

    function getProfLatLong(Request $request)
    {
        \App\Models\ProfGeoLocation::updateOrCreate(
            [
            'user_id' => $request->user_id,
            ],
            [
                'lat' => $request->lat,
                'long' => $request->long
            ]
        );
        echo '';
    }
}
