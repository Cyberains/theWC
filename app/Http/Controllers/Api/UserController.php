<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Mail;
use App\Mail\ConfirmMail;
use App\Models\Address;

class UserController extends Controller
{
//    -----------------
    public function verifyMobile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|integer',
            'otp' => 'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
                'code' => 428,
                'status' => 0,
                'message' => $validator->errors()
            ]);
        }

        date_default_timezone_set('Asia/Kolkata');
        $user = User::where('mobile', $request->mobile)->first();
        $currentdatetime = new DateTime();
        $date = strtotime($user->mobile_otp_expire);
        $interval = date_diff($currentdatetime, new DateTime(date('Y-m-d H:i:s', $date)));
        if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i <= 5) {
            if (intval($user->mobile_otp) == intval($request->otp)) {
                User::where('id', $user->id)->update(['mobile_status' => 1]);
                $userlogin = User::find($user->id);
                if (Auth::login($userlogin) == null) {
                    $user = Auth::user();
                    $tokenResult = $user->createToken($user->mobile . '-' . now())->accessToken;
                    return response()->json([
                        'access_token' => $tokenResult,
                        'token_type' => 'Bearer',
                        'code' => 200,
                        'status' => 1,
                        'data' => $user,
                        'message' => 'Your mobile number have been verified and logged in successfully.',
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 422,
                    'status' => 0,
                    'message' => 'Your OTP does not match.Please Enter Correct OTP'
                ]);
            }
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'Your OTP has been expired.Please Resend Your OTP.'
            ]);
        }
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $mobileotp = 1234;
        $mobile = $request->mobile;
        $mobiledata = User::where('mobile', $mobile)->where('mobile_status', 1)->get();
        if ($mobiledata->count() == 1) {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'This Mobile Number Already Exists.',
            ]);
        } else {
            $mobileexists = User::where('mobile', $mobile)->where('mobile_status', 0)->get();
            if ($mobileexists->count() == 1) {
                $form_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile_otp' => $mobileotp,
                    'mobile_otp_expire' => date("Y-m-d H:i:s"),
                    'role' => 'user',
                    'password' => bcrypt($request->password),
                    'refer_code' => generateReferCode()
                ];
                User::where('mobile', $mobile)->update($form_data);
                //Alert::success('', 'Category added successfully.');
                $user = User::where('mobile', $mobile)->first();
            } else {
                $form_data = [
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'mobile_otp' => $mobileotp,
                    'mobile_otp_expire' => date("Y-m-d H:i:s"),
                    'role' => 'user',
                    'password' => bcrypt($request->password),
                    'refer_code' => generateReferCode()
                ];
                $user = User::create($form_data);
            }
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $user,
                'message' => 'User Registered Successfully.Please Verify Mobile Number.',
            ]);
//            $mobileotp = generateOtp();
//            $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes. ";
//            $tempid = 1207162701871076797;
//            $response = sendsms(intval($request->mobile), $text, $tempid);
//            if ($response) {
//                $mobileexists = User::where('mobile', $mobile)->where('mobile_status', 0)->get();
//                if ($mobileexists->count() == 1) {
//                    $form_data = [
//                        'name' => $request->name,
//                        'email' => $request->email,
//                        'mobile_otp' => $mobileotp,
//                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
//                        'role' => 'user',
//                        'password' => bcrypt($request->password)
//                    ];
//                    User::where('mobile', $mobile)->update($form_data);
//                    //Alert::success('', 'Category added successfully.');
//                    $user = User::where('mobile', $mobile)->first();
//                } else {
//                    $form_data = [
//                        'name' => $request->name,
//                        'mobile' => $request->mobile,
//                        'email' => $request->email,
//                        'mobile_otp' => $mobileotp,
//                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
//                        'role' => 'user',
//                        'password' => bcrypt($request->password)
//                    ];
//                    $user = User::create($form_data);
//                }
//                return response()->json([
//                    'code' => 200,
//                    'status' => 1,
//                    'data' => $user,
//                    'message' => 'User Registered Successfully.Please Verify Mobile Number.',
//                ]);
//            } else {
//                return response()->json([
//                    'code' => 422,
//                    'status' => 0,
//                    'message' => 'Message Could Not be Sent.',
//                ]);
//            }
        }
    }

    public function ProfessionalRegister(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'qualification' => 'required',
            'experience' => 'required',
            'working_location' => 'required',
            'password' => 'required'
        ]);

        $mobileotp = 1234;
        $mobile = $request->mobile;
        $mobiledata = User::where('mobile', $mobile)->where('mobile_status', 1)->get();
        if ($mobiledata->count() == 1) {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'This Mobile Number Already Exists.',
            ]);
        } else {
            $mobileexists = User::where('mobile', $mobile)->where('mobile_status', 0)->get();
            if ($mobileexists->count() == 1) {
                $form_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'qualification' => $request->qualification,
                    'experience' => $request->experience,
                    'working_location' => $request->working_location,
                    'mobile_otp' => $mobileotp,
                    'mobile_otp_expire' => date("Y-m-d H:i:s"),
                    'role' => 'Professional',
                    'password' => bcrypt($request->password)
                ];
                User::where('mobile', $mobile)->update($form_data);
                $user = User::where('mobile', $mobile)->first();
            } else {
                $form_data = [
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'qualification' => $request->qualification,
                    'experience' => $request->experience,
                    'working_location' => $request->working_location,
                    'mobile_otp' => $mobileotp,
                    'mobile_otp_expire' => date("Y-m-d H:i:s"),
                    'role' => 'Professional',
                    'password' => bcrypt($request->password)
                ];
                $user = User::create($form_data);
            }
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $user,
                'message' => 'Professional Registered Successfully.Please Verify Mobile Number.',
            ]);
//            $mobileotp = generateOtp();
//            $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes. ";
//            $tempid = 1207162701871076797;
//            $response = sendsms(intval($request->mobile), $text, $tempid);
//            if ($response) {
//                $mobileexists = User::where('mobile', $mobile)->where('mobile_status', 0)->get();
//                if ($mobileexists->count() == 1) {
//                    $form_data = [
//                        'name' => $request->name,
//                        'email' => $request->email,
//                        'mobile_otp' => $mobileotp,
//                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
//                        'role' => 'user',
//                        'password' => bcrypt($request->password)
//                    ];
//                    User::where('mobile', $mobile)->update($form_data);
//                    //Alert::success('', 'Category added successfully.');
//                    $user = User::where('mobile', $mobile)->first();
//                } else {
//                    $form_data = [
//                        'name' => $request->name,
//                        'mobile' => $request->mobile,
//                        'email' => $request->email,
//                        'mobile_otp' => $mobileotp,
//                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
//                        'role' => 'user',
//                        'password' => bcrypt($request->password)
//                    ];
//                    $user = User::create($form_data);
//                }
//                return response()->json([
//                    'code' => 200,
//                    'status' => 1,
//                    'data' => $user,
//                    'message' => 'User Registered Successfully.Please Verify Mobile Number.',
//                ]);
//            } else {
//                return response()->json([
//                    'code' => 422,
//                    'status' => 0,
//                    'message' => 'Message Could Not be Sent.',
//                ]);
//            }
        }
    }

    public function resendOTP(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mobile_no' => 'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
                'code' => 428,
                'status' => 0,
                'message' => $validator->errors()
            ]);
        }

        if(check_mobile_registered_or_not($request->mobile_no)){
            try {
                $mobileotp = generateOtp();
                $text = "Your login otp for TWC account is ". $mobileotp.'.';
                $tempid = 1207166434787251472;
                $response = sendsms(intval($request->mobile_no), $text, $tempid);
                if($response){
                    $mobiledata = User::where('mobile', $request->mobile_no)->first();
                    $update = User::where('mobile', $mobiledata->mobile)->update(['mobile_otp' => $mobileotp, 'mobile_otp_expire' => date("Y-m-d H:i:s")]);
                    if ($update) {
                        return response()->json([
                            'code' => 200,
                            'status' => 1,
                            'message' => 'OTP has been sent successfully'
                        ]);
                    }
                }
            } catch (\Exception $e) {
                return response()->json([
                    'code' => 500,
                    'status' => 0,
                    'message' => $e->getMessage()
                ]);
            }
        }else{
            return response()->json([
                'code' => 404,
                'status' => 0,
                'message' => 'Your Mobile Number is not Registered. Please Registered Mobile Number.'
            ]);
        }
    }


    public function Login(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt([
            'mobile' => $request->mobile,
            'password' => $request->password,
            'mobile_status' => 1
        ])) {
            $user = Auth::user();
            $tokenResult = $user->createToken($user->mobile . '-' . now())->accessToken;
            return response()->json([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'code' => 200,
                'status' => 1,
                'data' => $user,
                'message' => 'You have been logged in successfully.',
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'Enter Valid Credential.'
            ]);
        }
    }

    public function LoginWithOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'mobile_otp' => 'required',
        ]);
        if (User::where(['mobile' => $request->mobile,'mobile_otp'=>$request->mobile_otp])->first() != null) {
            $user = User::where(['mobile' => $request->mobile,'mobile_otp'=>$request->mobile_otp])->first();
            $tokenResult = $user->createToken($user->mobile . '-' . now())->accessToken;
            return response()->json([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'code' => 200,
                'status' => 1,
                'data' => $user,
                'message' => 'You have been logged in successfully.',
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'Enter Valid Credential.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->token()->revoke();
            return response()->json([
                'code' => 200,
                'status' => 1,
                'message' => 'Logout Successfully.'
            ]);
        }
    }

    public function profile(Request $request): JsonResponse
    {
        $user = User::with(['getDefaultAddress'])->where('id',$request->user()->id)->first();
        if($request->user()->role == 'Professional'){
            $user['rating'] = getProfessionalsRating($user->id);
        }
        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $user,
            'message' => 'User Profile Details.'
        ]);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        if ($request->upload_photo != null) {
            $folderPath = public_path('images/users');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
            $image_parts = explode(";base64,", $request->upload_photo);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $file1 = public_path('images/users/'.uniqid().'.'.$image_type);
            $str_arr = preg_split ("/\//", $file1,5);
            $file = 'https://thewomenscompany.in/'.$str_arr[4];
            file_put_contents($file1, $image_base64);
        }
        else{
            $file = null;
        }
        $user = User::where('id',$request->user()->id)->first();
        $user->name = $request->name ?? $user->name ;
        $user->email = $request->email ?? $user->email;
//        $user->mobile = $request->mobile ?? $user->mobile;
        $user->dob = $request->dob ?? $user->dob;
        $user->working_location = $request->working_location ?? $user->working_location;
        $user->experience = $request->experience ?? $user->experience;
        $user->qualification = $request->qualification ?? $user->qualification;
        $user->upload_photo = $file ?? $user->upload_photo;
        $user->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $user,
            'message' => 'Profile Updated Successfully.',
        ]);
    }
//select(['name','email','mobile','refer_code','dob','upload_photo'])->
//    public function professionalProfile(Request $request): JsonResponse
//    {
//        $user = User::select([
//            'name','email','mobile','dob',
//            'working_location','experience','qualification','upload_photo'
//        ])->where('id',$request->user()->id)->first();
//        return response()->json([
//            'code' => 200,
//            'status' => 1,
//            'data' => $user,
//            'message' => 'Professional Profile Details.'
//        ]);
//    }
//    ------------------


    public function PasswordRequest(Request $request)
    {

        $mobile = intval($request->mobile);

        date_default_timezone_set('Asia/Kolkata');

        if (!User::where('mobile', $mobile)->where('mobile_status', 1)->exists()) {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'This mobile Number does not exists.'

            ]);
        }

        $mobileotp = generateOtp();

        $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes. ";
        $tempid = 1207162701871076797;

        $response = sendsms($mobile, $text, $tempid);

        if ($response) {

            $update = User::where('mobile', $mobile)->update(['mobile_otp' => $mobileotp, 'mobile_otp_expire' => date("Y-m-d H:i:s")]);

            if ($update) {

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'OTP has been send on your mobile Number.'

                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Technical problem occurs.Please try again later.'

            ]);
        }
    }

    public function PasswordResetUpdate(Request $request)
    {

        if ($request->password != $request->password_confirmation) {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Password does not match.'
            ]);
        }

        date_default_timezone_set('Asia/Kolkata');

        $user = User::where('mobile', $request->mobile)->first();

        $currentdatetime = new DateTime();

        $date = strtotime($user->mobile_otp_expire);

        $interval = date_diff($currentdatetime, new DateTime(date('Y-m-d H:i:s', $date)));


        if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i <= 5) {


            if (intval($user->mobile_otp) == intval($request->otp)) {

                $password = Hash::make($request->password);
                User::where('mobile', $request->mobile)->update(['password' => $password]);

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'Your Password Changed Successfully.'

                ]);
            } else {

                return response()->json([

                    'code' => 422,
                    'status' => 0,
                    'message' => 'Your OTP does not match.Please Enter Correct OTP.'

                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Your OTP has been expired.Please Resend Your OTP.'

            ]);
        }
    }

    public function UpdateAccount(Request $request)
    {


        $form_data = [

            'name' => $request->name,

        ];

        $update = User::where('id', $request->user()->id)->update($form_data);

        if ($update) {

            return response()->json([

                'code' => 422,
                'status' => 1,
                'data' => User::find($request->user()->id),
                'message' => 'User Account Updated Successfully.'

            ]);
        }
    }

    //Update Email

    public function ConfirmEmail(Request $request)
    {

        $emailotp = generateOtp();

        $data = [

            'email' => $request->email,
            'client_name' => User::find($request->user()->id)->name,
            'otp' => $emailotp,
            'subject' => 'Verify Email'
        ];

        Mail::to($data["email"], $data["client_name"])->send(new ConfirmMail($data));

        if (Mail::failures()) {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Mail can not be sent.'

            ]);
        } else {

            $update = User::where('id', $request->user()->id)->update(['email_otp' => $emailotp, 'email_otp_expire' => date("Y-m-d H:i:s")]);

            return response()->json([

                'code' => 200,
                'status' => 1,
                'message' => 'Mail has been sent successfully.'

            ]);
        }
    }

    public function verifyEmail(Request $request)
    {

        date_default_timezone_set('Asia/Kolkata');

        $user = User::find($request->user()->id);

        $currentdatetime = new DateTime();

        $date = strtotime($user->email_otp_expire);

        $interval = date_diff($currentdatetime, new DateTime(date('Y-m-d H:i:s', $date)));

        if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i <= 5) {

            if (intval($user->email_otp) == intval($request->otp)) {

                $update = User::where('id', $user->id)->update(['email' => $request->email, 'email_status' => 1]);

                if ($update) {

                    return response()->json([

                        'code' => 200,
                        'status' => 1,
                        'data' => User::find($request->user()->id),
                        'message' => 'Email has been Updated Successfully'

                    ]);
                }
            } else {

                return response()->json([

                    'code' => 422,
                    'status' => 0,
                    'message' => 'Your OTP does not match.Please Enter Correct OTP'


                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Your OTP has been expired.Please Resend Your OTP.'


            ]);
        }
    }


    public function resendEmailOTP(Request $request)
    {


        $emailotp = generateOtp();

        $data = [

            'email' => $request->email,
            'client_name' => $request->user()->name,
            'otp' => $emailotp,
            'subject' => 'Resend Email OTP'

        ];

        Mail::to($data["email"], $data["client_name"])->send(new ConfirmMail($data));

        if (Mail::failures()) {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Mail can not be sent.'

            ]);
        } else {

            $update = User::where('id', $request->user()->id)->update(['email_otp' => $emailotp, 'email_otp_expire' => date("Y-m-d H:i:s")]);

            if ($update) {

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'OTP has been resent successfully.'
                ]);
            }
        }
    }

    //update mobile

    public function ConfirmMobile(Request $request)
    {

        $mobile = $request->mobile;
        $mobiledata = User::where('mobile', $mobile)->where('mobile_status', 1)->get();

        if ($mobiledata->count() == 1) {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'This Mobile Number Already Exists.'
            ]);
        } else {

            $mobileotp = generateOtp();

            $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes. ";
            $tempid = 1207162701871076797;


            $response = sendsms(intval($request->mobile), $text, $tempid);

            if ($response) {

                $update = User::where('id', $request->user()->id)->update(['mobile_otp' => $mobileotp, 'mobile_otp_expire' => date("Y-m-d H:i:s")]);

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'OTP has been sent successfully.'
                ]);
            } else {

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'Message Could Not be Sent.'
                ]);
            }
        }
    }

    public function verifyUpdateMobile(Request $request)
    {

        date_default_timezone_set('Asia/Kolkata');

        $user = User::find($request->user()->id);

        $currentdatetime = new DateTime();

        $date = strtotime($user->mobile_otp_expire);

        $interval = date_diff($currentdatetime, new DateTime(date('Y-m-d H:i:s', $date)));

        if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i <= 5) {


            if (intval($user->mobile_otp) == intval($request->otp)) {

                $update = User::where('id', $user->id)->update(['mobile' => $request->mobile, 'mobile_status' => 1]);

                if ($update) {

                    return response()->json([

                        'code' => 200,
                        'status' => 1,
                        'data' => User::find($request->user()->id),
                        'message' => 'Mobile has been Updated Successfully'


                    ]);
                }
            } else {

                return response()->json([

                    'code' => 422,
                    'status' => 0,
                    'message' => 'Your OTP does not match.Please Enter Correct OTP'


                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Your OTP has been expired.Please Resend Your OTP.'


            ]);
        }
    }

    public function resendMobileOTP(Request $request)
    {

        $mobileotp = generateOtp();

        $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes. ";

        $tempid = 1207162701871076797;

        $response = sendsms(intval($request->mobile), $text, $tempid);

        if ($response) {

            $update = User::where('id', Auth::user()->id)->update(['mobile_otp' => $mobileotp, 'mobile_otp_expire' => date("Y-m-d H:i:s")]);


            if ($update) {

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'OTP has been resent successfully.'
                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Message could not be sent.Something went wrong.'


            ]);
        }
    }

    public function Address(Request $request)
    {

        $addresses = Address::where('user_id', $request->user()->id)->get();

        return response()->json([

            'code' => 200,
            'status' => 1,
            'data' => $addresses,
            'message' => 'Address got sucessfully.'

        ]);
    }

    public function AddressStore(Request $request)
    {

        if ($request->has('is_default')) {

            $update = Address::where('user_id', Auth::user()->id)->get();

            if ($update->count() > 0) {

                Address::where('user_id', Auth::user()->id)->update(['is_active' => 0]);
            }

            $active = intval($request->is_default);
        } else {

            $active = 0;
        }

        $form_data = [

            'user_id' => Auth::user()->id,
            'address_type' => $request->address_type,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'house_no' => $request->house_no,
            'area' => $request->area,
            'landmark' => $request->landmark,
            'zipcode' => $request->zip_code,
            'is_active' => $active,

        ];

        Address::create($form_data);

        return response()->json([

            'code' => 200,
            'status' => 1,
            'message' => 'Address Added Successfully'
        ]);
    }

    public function AddressUpdate(Request $request)
    {

        if ($request->has('is_default')) {

            $update = Address::where('user_id', Auth::user()->id)->get();

            if ($update->count() > 0) {

                Address::where('user_id', Auth::user()->id)->update(['is_active' => 0]);
            }

            $active = intval($request->is_default);
        } else {

            $active = 0;
        }

        $update = [

            'user_id' => $request->user()->id,
            'address_type' => $request->address_type,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'house_no' => $request->house_no,
            'area' => $request->area,
            'landmark' => $request->landmark,
            'zipcode' => $request->zip_code,
            'is_active' => $active,

        ];

        Address::where('id', $request->id)->update($update);

        return response()->json([

            'code' => 200,
            'status' => 1,
            'message' => 'Address Updated Successfully'
        ]);
    }

    public function AddressDelete(Request $request)
    {

        $address = Address::find($request->id);
        $address->delete();

        return response()->json([

            'code' => 200,
            'status' => 1,
            'message' => 'Address Deleted Successfully.'

        ]);
    }

    public function UpdatePassword(Request $request)
    {

        $hashedpasswords = $request->user()->password;


        if (Hash::check($request->old_password, $hashedpasswords)) {

            if ($request->password != $request->password_confirmation) {

                return response()->json([

                    'code' => 422,
                    'status' => 0,
                    'message' => 'Password does not match.'

                ]);
            } else {
                $user = User::find($request->user()->id);
                $user->password = Hash::make($request->password);
                $user->save();

                return response()->json([

                    'code' => 200,
                    'status' => 1,
                    'message' => 'Password is changed Successfully'

                ]);
            }
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'Current Password is invalid'
            ]);
        }
    }

    public function UpdateAvatar(Request $request)
    {
        $request->validate([
            'avatar_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $user = User::findOrFail($request->user()->id);
            $image = $request->file('avatar_file');
            $input['imagename'] = time() . '.' . $image->extension();
            $save_path = public_path('images/avatar');
            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            //test
            $result = $image->move($save_path, $input['imagename']);
            // $avatarData = json_decode($request->input('avatar_data'));
            // $img->crop((int)$avatarData->width,(int)$avatarData->height,(int)$avatarData->x,(int)$avatarData->y)->save(public_path('images/avatar').'/'.$input['imagename']);
            $user->upload_photo = $input['imagename'];
            $user->save();
            return response()->json([
                'code' => 200,
                'status' => 1,
                'avataurl' => url('public/images/avatar') . '/' . $input['imagename'],
                'message' => 'Image Uploaded Successfully',
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }


    public function getUser(Request $request)
    {

        $userdata = User::with('addressName')->find($request->user()->id);

        if ($userdata != null) {

            return response()->json([

                'code' => 200,
                'status' => 1,
                'data' => $userdata,
                'message' => 'User Data Successfully Received.'
            ]);
        } else {

            return response()->json([

                'code' => 422,
                'status' => 0,
                'message' => 'No User data Exists.'
            ]);
        }
    }
}
