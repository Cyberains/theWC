<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ProfessionalSkills;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user['get_all_services_for_skill'] = SubCategory::select(['id','title'])->get();
        $skill_ids = ProfessionalSkills::where(['professional_id' => $request->user()->id])->pluck('skill_id');
        $user['skills'] = SubCategory::whereIn('id',$skill_ids)->pluck('title');
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
            'qualification' => 'required'
        ]);
        $user = User::where(['id'=> $request->user()->id])->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->experience = $request->experience;
        $user->qualification = $request->qualification;
        if($user->save()){
            Alert::success('', 'Successfully Updated');
            return redirect()->route('professional.profile');
        }
    }

    public function add_prof_address(Request $request){
        $request->validate([
            'house_no' => 'required',
            'area' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address_type' => 'nullable',
            'mobile' => 'required',
            'is_default' => 'nullable'
        ]);

        $form_data = [
            'user_id' => $request->user()->id,
            'house_no' => $request->house_no,
            'area' => $request->area,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'state' => $request->state,
            'address_type' => $request->address_type,
            'mobile' => $request->mobile,
            'landmark' => $request->landmark,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_default' => $request->is_default == 'on' ? 1 : 0
        ];

        $address = Address::create($form_data);
        if($address->save()){
            if($request->is_default == 'on'){
                $addresses  = Address::where(['user_id'=>$request->user()->id])->where('id','!=',$address->id)->get();
                foreach ($addresses as $addr){
                    $addre = Address::where(['id' => $addr->id])->first();
                    $addre->is_default = 0;
                    $addre->save();
                }
            }
            Alert::success('', 'Address Successfully Added');
            return redirect()->route('professional.profile');
        }
    }

    public function add_skill(Request $request){
        if($request->has('skills')){
            $pro = ProfessionalSkills::where(['professional_id' => $request->user()->id])->get('id');
            foreach ($pro as $pr){
                $pr->delete();
            }
            foreach ($request->skills as $skill){
                $prof_skill = ProfessionalSkills::updateOrCreate([
                    'professional_id' => $request->user()->id,
                    'skill_id' => $skill
                ]);
            }
            Alert::success('', 'Skill Successfully Added');
            return redirect()->route('professional.profile');
        }
    }

    function getProfLatLong(Request $request)
    {
        if (Auth::check() && $request->has(['latitude','longitude'])) {
            \App\Models\ProfGeoLocation::updateOrCreate(
                [
                    'user_id' => $request->user()->id,
                ],
                [
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude
                ]
            );
        }
        echo '';
    }
}
