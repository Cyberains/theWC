<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Excel;
use App\Exports\SMSExport;
use Illuminate\Support\Facades\Session;
Use Alert;
use App\Jobs\SendBulkSMSJob;

class SMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.marketing.sms');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function smsExport(Request $request){

        return Excel::download(new SMSExport(),'sms_'.time().'.xlsx');
    }

    public function sendSMS(Request $request){

        if($request->sms_type=='sms-bulk'){

            $request->validate([

               'import_file' => 'required|mimes:xlsx,txt',
               'message'=>'required'

            ]);

            $excelName = 'SMSExcel.xlsx';

            $value = $request->import_file->move(public_path('excel'), $excelName);

            $data = array();

            $data['message']=$request->message;
            $data['sms_type'] = $request->sms_type;

            $smsJob = new SendBulkSMSJob($data);

            dispatch($smsJob)->delay(now()->addSecond(2));


        }
        elseif($request->sms_type=='sms-individual'){

            $request->validate([

               'mobile' => 'required',
               'message'=>'required'

            ]);

            $smsJob = new SendBulkSMSJob($request->all());

            dispatch($smsJob)->delay(now()->addSecond(5));



        }

        Session::flash('message', 'Message Processing....');
            return redirect()->route('admin.sms');


    }

    // public function testsms(){

    //     $data = sendsms(9149173289,'sdfs');
    //     dd($data);

    // }

}
