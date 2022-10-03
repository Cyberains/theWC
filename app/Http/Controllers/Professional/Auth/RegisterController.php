<?php

namespace App\Http\Controllers\Professional\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('professional.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(['mobile' => $request->mobile])->first();
        if($user){
            Alert::warning('Mobile Number Already Used.', '');
            return view('professional.auth.register');
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'role' => 'Professional',
                'experience' => $request->experience,
                'qualification' => $request->qualification,
                'password' => Hash::make($request->password),
            ]);
            Alert::success('Successfully Registered', '');
            return redirect()->route('login');
        }
    }
    protected function guard()
    {
        return Auth::guard();
    }
}
