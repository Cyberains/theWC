<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Excel;
use App\Imports\smsImport;

class SendBulkSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if($this->data['sms_type']=='sms-bulk'){

            $excelfile = public_path('excel/SMSExcel.xlsx');

            try{

                Excel::import(new smsImport($this->data['message']),$excelfile);

            }catch ( \Exception $e ){

                throw $e;

                //return response()->json(['success'=>'errorList','message'=> $e->errors()]);

                //return view('admin.marketing.sms')->with('error',$e->errors());


            }

        }
        elseif($this->data['sms_type']=='sms-individual'){

            $mobilearr = explode(',',$this->data['mobile']);

            foreach ($mobilearr as $mobile) {
                
                sendSms($mobile,$this->data['message']);
            }

        }
        
    }

    public function failed(Exception $exception)
    {
        
        return response()->json(['success'=>'errorList','message'=> $exception->errors()]);

    }
}
