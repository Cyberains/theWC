<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Country;
use App\Models\Address;
use App\Models\User;
use Auth;
use DateTime;
use Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmMail;
use Mail;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('preventBackHistory');
        
    }

    public function index(){
    
    	return view('user.customers.overview');

    }

    public function showLoginForm(){

        return view('user.customers.login');
    }

    public function Login(Request $request){

        $request->validate([

            'mobile' => 'required',
            'password' => 'required',
        ]);


        $remember_me = $request->has('remember') ? true : false; 


        if (auth()->attempt(['mobile' => $request->mobile,'password' => $request->password,'mobile_status'=>1,'role'=>'user'], $remember_me))
        {
            
            return redirect('/')->with('success','User LoggedIn Successfully');

        }else{

            return back()->with('error','Enter Valid Credentials.');
        }
    }

    public function showRegisterForm(){

        return view('user.customers.register');

    }

    public function Register(Request $request){

        $this->validate($request, [

            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'

        ]);

        $mobile = $request->mobile;
        $mobiledata = User::where('mobile',$mobile)->where('mobile_status',1)->get();

        if ($mobiledata->count()==1) {

            Session::flash('error', 'This Mobile Number Already Exists.');
            return redirect()->back();

        }
        else{

            $mobileotp = generateOtp();

            $text="Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is ".$mobileotp.". This OTP is valid for 5 minutes. ";

            $tempid = 1207162701871076797;

            $response = sendsms(intval($request->mobile),$text,$tempid);

            if($response){

                $mobileexists = User::where('mobile',$mobile)->where('mobile_status',0)->get();

                if ($mobileexists->count()==1) {

                    $form_data=[
                        
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'mobile_otp'=>$mobileotp,
                        'mobile_otp_expire'=>date("Y-m-d H:i:s"),
                        'role'=>'user',
                        'password'=>bcrypt($request->password)
                    ];
                    User::where('mobile',$mobile)->update($form_data);
                    //Alert::success('', 'Category added successfully.');
                   
                   
                }
                else{


                    $form_data=[
                        
                        'name'=>$request->name,
                        'mobile'=>$request->mobile,
                        'email'=>$request->email,
                        'mobile_otp'=>$mobileotp,
                        'mobile_otp_expire'=>date("Y-m-d H:i:s"),
                        'role'=>'user',
                        'password'=>bcrypt($request->password)
                    ];

                    User::create($form_data);
                }

                Session::flash('otp',$request->mobile);
                Session::flash('message','User Registered Successfully.Please Verify Mobile Number.');


            }

            else{

                Session::flash('error','Message Could Not be Sent');

            }

        }

        return redirect()->route('user.register');
        
    }

    public function resendOTP(Request $request){

        $mobile = $request->mobile_no;

        $mobileotp = generateOtp();

        $text="Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is ".$mobileotp.". This OTP is valid for 5 minutes. ";
        $tempid = 1207162701871076797;

        $response = sendsms(intval($mobile),$text,$tempid);       

        if ($response){

            $mobiledata = User::where('mobile',$mobile)->get();
                
            $update = User::where('mobile',$mobile)->update(['mobile_otp'=>$mobileotp,'mobile_otp_expire'=>date("Y-m-d H:i:s")]);

            if ($update) {
                
                return response()->json([

                    'code'=>200,
                    'status'=>1,
                    'message'=>'OTP has been resent successfully.'
                ]);
            }
            
        }
        else{

            return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Message could not be sent.Something went wrong.'


                ]);            

        }
        

    }


    public function verifyMobile(Request $request){

        date_default_timezone_set('Asia/Kolkata');

        $user = User::where('mobile',$request->mobile)->first();

        $currentdatetime = new DateTime();

            $date = strtotime($user->mobile_otp_expire);

            $interval = date_diff($currentdatetime,new DateTime(date('Y-m-d H:i:s', $date)));

            if($interval->y==0 && $interval->m==0 && $interval->d==0 && $interval->h==0 && $interval->i<=5 ){

                
                if (intval($user->mobile_otp) == intval($request->otp)) {

                    User::where('id',$user->id)->update(['mobile_status'=>1]);

                    $userlogin = User::find($user->id);

                    //dd(Auth::login($userlogin));

                    //dd(Auth::user()->mobile);

                    if(Auth::login($userlogin)==null){

                        Session::flash('success', 'User have been Logged In Successfully.');
                        return response()->json([

                        'code'=>200,
                        'status'=>1,
                        'message'=>'Mobile Number has been verified.'


                        ]);

                    }
                    
                }
                else{

                    return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP does not match.Please Enter Correct OTP'


                    ]);
                }

            }

            else{

                return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP has been expired.Please Resend Your OTP.'


                ]);
            }

    }

    public function showPasswordResetForm(){

        return view('user.customers.passwords.mobile');

    }

    public function PasswordRequest(Request $request){

        $mobile = intval($request->mobile);

        date_default_timezone_set('Asia/Kolkata'); 

        $f = ['mobile'=>'This mobile Number does not exists.']; 

        $d = ['mobile'=>'Technical problem occurs.Please try again later'];

        if (!User::where('mobile',$mobile)->exists()) {
            
            return redirect()->back()->withErrors($f); 
        }

        $mobileotp = generateOtp();

        $text="Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is ".$mobileotp.". This OTP is valid for 5 minutes. ";
        $tempid = 1207162701871076797;

        $response = sendsms($mobile,$text,$tempid);

        if ($response){

            $update = User::where('mobile',$mobile)->update(['mobile_otp'=>$mobileotp,'mobile_otp_expire'=>date("Y-m-d H:i:s")]);

            if($update){
                
                $mobile_no = $mobile;
                Session::flash('message','OTP has been send on your mobile No.');
                return view('user.customers.passwords.reset',compact('mobile_no'));

            }

        }
        else{

            return redirect()->route('user.password.reset')->withErrors($d);             
        }

    }

    public function PasswordResetUpdate(Request $request){

        $request->validate([
           'password' => 'required|min:6|confirmed'
        ]);
        
        date_default_timezone_set('Asia/Kolkata');

        $m = ['otp' => 'Your OTP does not match.Please Enter Correct OTP.'];

        $d = ['otp'=>'Your OTP has been expired.Please Resend Your OTP'];

        $user = User::where('mobile',$request->mobile)->first();

        $currentdatetime = new DateTime();

        $date = strtotime($user->mobile_otp_expire);

        $interval = date_diff($currentdatetime,new DateTime(date('Y-m-d H:i:s', $date)));


        if($interval->y==0 && $interval->m==0 && $interval->d==0 && $interval->h==0 && $interval->i<=5 ){

            
            if (intval($user->mobile_otp) == intval($request->otp)) {

                $password = Hash::make($request->password);
                User::where('mobile',$request->mobile)->update(['password'=>$password]);

                Session::flash('message', 'Your Password Changed Successfully.');
                return redirect()->route('user.login');
            }
            else{

                $mobile_no =$request->mobile;
                return view('user.customers.passwords.reset',compact('mobile_no'))->withErrors($m);
            }

        }

        else{

            $mobile_no =$request->mobile;
            return view('user.customers.passwords.reset',compact('mobile_no'))->withErrors($d);
        }
        
    }

    public function editAccount(){

    	return view('user.customers.edit-account');
    }

    public function UpdateAccount(Request $request){

        $request->validate([

            'name'=>'required',

        ]);
        
        $form_data = [

            'name'=>$request->name,
            'dob'=>$request->dob

        ];

        $update = User::where('id',$request->user_id)->update($form_data);

        if ($update) {
           
            Session::flash('message', 'User Account Updated Successfully.');
            return redirect()->back(); 

        }


    }


    public function UpdateEmail(){

        return view('user.customers.update_profile.email');
    }

    public function ConfirmEmail(Request $request){

        $request->validate([

            'email'=>'required|email'
        ]);

        $emailotp = generateOtp();

        $data=[

            'email'=>$request->email,
            'client_name'=>User::find($request->user_id)->name,
            'otp'=>$emailotp,
            'subject'=>'Verify Email'
        ];

        Mail::to($data["email"], $data["client_name"])->send(new ConfirmMail($data));

        if (Mail::failures()) {

            Session::flash('message', 'Mail can not be sent.');
            return redirect()->route('user.update-email');
             
        }else{

            $update = User::where('id',$request->user_id)->update(['email_otp'=>$emailotp,'email_otp_expire'=>date("Y-m-d H:i:s")]);

            Session::flash('message','Mail has been sent successfully');
            Session::flash('email',$request->email);
            Session::flash('user_id',$request->user_id);

            return redirect()->route('user.update-email');

        }


    }

    public function verifyEmail(Request $request){

        date_default_timezone_set('Asia/Kolkata');

        $user = User::find($request->userid);

        $currentdatetime = new DateTime();

            $date = strtotime($user->email_otp_expire);

            $interval = date_diff($currentdatetime,new DateTime(date('Y-m-d H:i:s', $date)));

            if($interval->y==0 && $interval->m==0 && $interval->d==0 && $interval->h==0 && $interval->i<=5 ){

                
                if (intval($user->email_otp) == intval($request->otp)) {

                    $update = User::where('id',$user->id)->update(['email'=>$request->email,'email_status'=>1]);

                    if($update){

                        Session::flash('success', 'Email has been Updated Successfully.');
                        return response()->json([

                        'code'=>200,
                        'status'=>1,
                        'message'=>'Email has been Updated Successfully'


                        ]);

                    }
                    
                }
                else{

                    return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP does not match.Please Enter Correct OTP'


                    ]);
                }

            }

            else{

                return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP has been expired.Please Resend Your OTP.'


                ]);
            }
    }


    public function resendEmailOTP(Request $request){


        $emailotp = generateOtp();

        $data=[

            'email'=>$request->email,
            'client_name'=>Auth::user()->name,
            'otp'=>$emailotp,
            'subject'=>'Resend Email OTP'

        ];

        Mail::to($data["email"], $data["client_name"])->send(new ConfirmMail($data));

        if (Mail::failures()) {

            Session::flash('message', 'Mail can not be sent.');
            return redirect()->route('user.update-email');
             
        }else{
                
            $update = User::where('id',Auth::user()->id)->update(['email_otp'=>$emailotp,'email_otp_expire'=>date("Y-m-d H:i:s")]);

            if ($update) {
                
                return response()->json([

                    'code'=>200,
                    'status'=>1,
                    'message'=>'OTP has been resent successfully.'
                ]);
            }
            
        }

    }

    public function UpdateMobile(){

        return view('user.customers.update_profile.mobile');

    }

    public function ConfirmMobile(Request $request){

        $mobile = $request->mobile;
        $mobiledata = User::where('mobile',$mobile)->where('mobile_status',1)->get();

        if ($mobiledata->count()==1) {

            Session::flash('error', 'This Mobile Number Already Exists.');
            return redirect()->back();

        }
        else{

            $mobileotp = generateOtp();

            $text="Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is ".$mobileotp.". This OTP is valid for 5 minutes. ";
            $tempid = 1207162701871076797;

            $response = sendsms(intval($request->mobile),$text,$tempid);

            if($response){

                $update = User::where('id',$request->user_id)->update(['mobile_otp'=>$mobileotp,'mobile_otp_expire'=>date("Y-m-d H:i:s")]);

                Session::flash('message','OTP has been sent successfully');
                Session::flash('mobile',$request->mobile);
                Session::flash('user_id',$request->user_id);

                return redirect()->route('user.update-mobile');
                
            }

            else{

                Session::flash('error','Message Could Not be Sent');

            }

        }

        return redirect()->route('user.update-mobile');

    }

    public function verifyUpdateMobile(Request $request){

        date_default_timezone_set('Asia/Kolkata');

        $user = User::find($request->userid);

        $currentdatetime = new DateTime();

            $date = strtotime($user->mobile_otp_expire);

            $interval = date_diff($currentdatetime,new DateTime(date('Y-m-d H:i:s', $date)));

            if($interval->y==0 && $interval->m==0 && $interval->d==0 && $interval->h==0 && $interval->i<=5 ){

                
                if (intval($user->mobile_otp) == intval($request->otp)) {

                    $update = User::where('id',$user->id)->update(['mobile'=>$request->mobile,'mobile_status'=>1]);

                    if($update){

                        Session::flash('success', 'Mobile has been Updated Successfully.');
                        return response()->json([

                        'code'=>200,
                        'status'=>1,
                        'message'=>'Mobile has been Updated Successfully'


                        ]);

                    }
                    
                }
                else{

                    return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP does not match.Please Enter Correct OTP'


                    ]);
                }

            }

            else{

                return response()->json([

                    'code'=>422,
                    'status'=>0,
                    'message'=>'Your OTP has been expired.Please Resend Your OTP.'


                ]);
            }

    }

    public function resendMobileOTP(Request $request){

        $mobileotp = generateOtp();

        $text="Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is ".$mobileotp.". This OTP is valid for 5 minutes. ";
        $tempid = 1207162701871076797;

        $response = sendsms(intval($request->mobile),$text,$tempid);       

        if ($response){
                
            $update = User::where('id',Auth::user()->id)->update(['mobile_otp'=>$mobileotp,'mobile_otp_expire'=>date("Y-m-d H:i:s")]);

            if ($update) {
                
                return response()->json([

                    'code'=>200,
                    'status'=>1,
                    'message'=>'OTP has been resent successfully.'
                ]);
            }
            
        }
        else{

            return response()->json([

                'code'=>422,
                'status'=>0,
                'message'=>'Message could not be sent.Something went wrong.'


            ]);            

        }
    }


    public function Order(){

    	return view('user.customers.orders.list');

    }

    public function Address(){
    	$addresses = Address::where('user_id',Auth::user()->id)->get();
    	return view('user.customers.address.list',compact('addresses'));
    }

    public function AddressAdd(){

    	$countrydata = World::Countries();
    	return view('user.customers.address.create',compact('countrydata'));
    }

    public function AddressStore(Request $request){
                        
        if($request->has('is_default')){
        
            $update = Address::where('user_id', Auth::user()->id)->get();

            if ($update->count()>0) {

                Address::where('user_id', Auth::user()->id)->update(['is_active'=>0]);

            }
            
            $active = intval($request->is_default);
        }
        else{

            $active =0;
        }

        $form_data = [

            'user_id'=>Auth::user()->id,
            'address_type'=>$request->address_type,
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->phone,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'house_no'=>$request->house_no,
            'area'=>$request->area,
            'landmark'=>$request->landmark,
            'zipcode'=>$request->zip_code,
            'is_active'=>$active,

        ];

        Address::create($form_data);
        Session::flash('message','Address added Successfully');
        return redirect()->route('user.address');
    }

    public function AddressEdit($id){

    	$countrydata = World::Countries();

        $address = Address::find($id);
    	return view('user.customers.address.edit',compact(['countrydata','address']));
    }

    public function AddressUpdate(Request $request){

        if($request->has('is_default')){
        
            $update = Address::where('user_id', Auth::user()->id)->get();

            if ($update->count()>0) {

                Address::where('user_id', Auth::user()->id)->update(['is_active'=>0]);

            }
            
            $active = intval($request->is_default);
        }
        else{

            $active =0;
        }

        $update = [

            'user_id'=>Auth::user()->id,
            'address_type'=>$request->address_type,
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->phone,
            'country'=>$request->country,
            'state'=>$request->state,
            'city'=>$request->city,
            'house_no'=>$request->house_no,
            'area'=>$request->area,
            'landmark'=>$request->landmark,
            'zipcode'=>$request->zip_code,
            'is_active'=>$active,

        ];

        Address::where('id',$request->id)->update($update);
        Session::flash('message','Address Updated Successfully');
        return redirect()->route('user.address');
    	
    }

    public function AddressDelete($id){

        $address = Address::find($id);
        $address->delete();

        Session::flash('message','Address Deleted Successfully');
        return redirect()->route('user.address');
    }

    public function ChangePassword(){

    	return view('user.customers.change-password');
    }

    public function UpdatePassword(Request $request){

        $hashedpasswords = auth()->user()->password;


        if (Hash::check($request->old_password,$hashedpasswords)) {

            $request->validate([

               'password' => 'required|min:6|confirmed'

            ]);

            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('message','Password is changed Successfully');
            return redirect()->back();
        }
        else{

            //dd('yadav');
            Session::flash('error','Current Password is invalid');
            return redirect()->back();
        }

    }

    public function Logout(Request $request){
    	
        Session::flush();
        Auth::logout();
        Session::flash('message', 'User LoggedOut successfully.');
    	return redirect()->route('user.home');
    }

    public function UpdateAvatar(Request $request){

        $request->validate([

            'avatar_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            
            $user = User::findOrFail($request->avatar_id);

            $image = $request->file('avatar_file');
            $input['imagename'] = time().'.'.$image->extension();
         
            $save_path = public_path('images/avatar');
            $img = Image::make($image->path());

            if (!file_exists($save_path)) {

                mkdir($save_path, 666, true);
            }

            $avatarData = json_decode($request->input('avatar_data'));

            $img->crop((int)$avatarData->width,(int)$avatarData->height,(int)$avatarData->x,(int)$avatarData->y)->save(public_path('images/avatar').'/'.$input['imagename']);    

            $user->upload_photo = $input['imagename'];
            $user->save();

            return response()->json([

                'error'=>false,
                'data'=>['url'=>asset('public/images/avatar/').'/'.$input["imagename"]],
                'message'=>'Image Uploaded Successfully',

            ]);
                
        } catch (Exception $exception) {

            return response()->json([

                'error'=>true,
                'message'=>$exception->getMessage()

            ]);
    
        }

    }
}
