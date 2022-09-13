<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use DateTime;
use Auth;
use Carbon\Carbon;
use App\Models\Membership;
use PDF;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userdata = User::whereNotIn('role', ['admin'])->orderBy('id', 'DESC')->get();
        return view('admin.customer.customer', compact('userdata'));
    }

    public function toggle(Request $request)
    {

        if (isset($request->status) && isset($request->id)) {

            $update = User::where('id', $request->id)->update(['is_active' => $request->status]);

            if ($update) {

                echo 1;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $mobile = $request->mobile;
        $mobiledata = User::where('mobile', $mobile)->where('mobile_status', 1)->get();

        if ($mobiledata->count() == 1) {

            Session::flash('error', 'This Mobile Number Already Exists.');
            return redirect()->back();
        } else {

            $mobileotp = generateOtp();

            $text = "Dear valuable customer!!! Your OTP for verification to your EarlyBasket account is " . $mobileotp . ". This OTP is valid for 5 minutes.";

            $tempid = 1207162701871076797;

            $response = sendsms(intval($request->mobile), $text, $tempid);

            if ($response) {

                $mobileexists = User::where('mobile', $mobile)->where('mobile_status', 0)->get();

                if ($mobileexists->count() == 1) {

                    $form_data = [

                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile_otp' => $mobileotp,
                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
                        'role' => 'user'
                    ];
                    User::where('mobile', $mobile)->update($form_data);
                } else {
                    $form_data = [
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'mobile_otp' => $mobileotp,
                        'mobile_otp_expire' => date("Y-m-d H:i:s"),
                        'role' => 'user'
                    ];

                    User::create($form_data);
                }

                // Session::flash('otp',$request->mobile);
                Session::flash('message', 'Customer Added Successfully');
            } else {

                Session::flash('error', 'Message Could Not be Sent');
            }
        }

        return redirect()->route('admin.billing');
    }

    public function roleUser(Request $request)
    {

        $mobile = $request->mobile;
        $mobiledata = User::where('mobile', $mobile)->get();

        if ($mobiledata->count() == 1) {

            Session::flash('error', 'This Mobile Number Already Exists.');
            return redirect()->back();
        } else {

            if ($request->has('email') && $request->email != '') {
                $email = 1;
            } else {
                $email = 0;
            }

            $form_data = [

                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'mobile_status' => 1,
                'email_status' => $email,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ];

            User::create($form_data);
            Session::flash('message', 'Person Added Successfully');

            return redirect()->route('admin.customer');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerdata = User::find($id);
        return view('admin.customer.customer_view', compact('customerdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('message', 'User deleted successfully.');
        return redirect()->route('admin.customer');
    }

    public function resendOTP(Request $request)
    {

        $mobile = $request->mobile_no;

        $mobileotp = generateOtp();

        $text = "Thank you for registering with Early Basket.Your OTP is " . $mobileotp . ".OTP is valid for 30 minutes.";

        $response = sendsms(intval($mobile), $text);

        if ($response) {

            $mobiledata = User::where('mobile', $mobile)->get();

            $update = User::where('mobile', $mobile)->update(['mobile_otp' => $mobileotp, 'mobile_otp_expire' => date("Y-m-d H:i:s")]);

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


    public function verifyMobile(Request $request)
    {

        date_default_timezone_set('Asia/Kolkata');

        $user = User::where('mobile', $request->mobile_no)->first();

        $currentdatetime = new DateTime();

        $date = strtotime($user->mobile_otp_expire);

        $interval = date_diff($currentdatetime, new DateTime(date('Y-m-d H:i:s', $date)));

        if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0 && $interval->h == 0 && $interval->i <= 5) {


            if (intval($user->mobile_otp) == intval($request->otp)) {

                $password = Str::random(8);

                $hashed_random_password = bcrypt($password);

                User::find($user->id)->update(['mobile_status' => 1, 'password' => $hashed_random_password]);

                $text = "Your Mobile Number has been verified.Your password is " . $password . ".Please login with this password for online shopping on Early Basket Portal.";

                $response = sendsms(intval($request->mobile_no), $text);

                if ($response) {

                    Session::flash('message', 'Your Mobile Number has been verified.');
                    Session::flash('password', 'Password has been sent on your Mobile Number for online shopping.');


                    return response()->json([

                        'code' => 200,
                        'status' => 1,
                        'message' => 'Your Mobile Number has been verified.'


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


    public function checkMembership(Request $request)
    {

        $date = strtotime(now());

        $genuinedate = date('Y-m-d', $date);

        $usermembershipdata = User::where('id', $request->id)->where('membership_status', 1)->where('m_start_date', '<=', $genuinedate)->where('m_end_date', '>=', $genuinedate)->get();

        $usedata = User::find($request->id);

        if ($usermembershipdata->count() == 1) {

            return response()->json([

                'm_status' => 1,
                'user_data' => $usedata

            ]);
        } else {

            return response()->json([

                'm_status' => 0,
                'user_data' => $usedata


            ]);
        }
    }

    public function addCustomerMembership(Request $request)
    {

        $membershipdata = Membership::find($request->membership);

        $days = intval($membershipdata->duration);

        $currentdate =

            $currentDateTime = Carbon::now();

        $startdate = date('Y-m-d', strtotime($currentDateTime));

        $newDateTime = Carbon::now()->addDays($days);

        $enddate = date('Y-m-d', strtotime($newDateTime));

        $user = User::where('id', $request->user_id)->update(['membership_status' => 1, 'm_start_date' => $startdate, 'm_end_date' => $enddate, 'm_payment' => $request->payment_type, 'm_price' => $membershipdata->price]);

        if ($user) {

            Session::flash('message', 'Membership Successfully assigned to this User');
            return redirect()->back();
        }
    }

    public function MembershipReceipt($id)
    {


        $userdata = User::find($id);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $userdata->m_end_date);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $userdata->m_start_date);
        $days = $to->diffInDays($from);

        if ($days = 365) {

            $membership_type = 'Yearly';
        } elseif ($days = 29) {

            $membership_type = 'Monthly';
        } else {

            $membership_type = 'Quaterly';
        }
        $size = array(0, 0, 400, 205.9447);
        $pdf = PDF::loadView('admin.billing.membershipslip', ['userdata' => $userdata, 'membership_type' => $membership_type])->setPaper($size, 'landscape');

        return $pdf->stream($userdata->name);
    }

    public function GetUser(Request $request)
    {

        $userdata = User::where('mobile', 'LIKE', '%' . $request->search . '%')->get();

        if ($userdata->count() > 0) {

            return response()->json([

                'status' => 1,
                'userdata' => $userdata

            ]);
        } else {

            return response()->json([

                'status' => 0

            ]);
        }
    }
}
