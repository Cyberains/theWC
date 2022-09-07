<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\ExternalFiles\EasebuzzLib\Easebuzz;
use Auth;
use App\Models\Payment;
use App\Events\PaymentEvent;

class CheckoutController extends Controller
{


    public function EaseBuzz(Request $request){

        $format = 'EB'.date('my',strtotime(now()));

        $orderlastrow = Checkout::orderBy('id','DESC')->first();

        if ($orderlastrow!=null) {
                        
            $last_order_id = $orderlastrow->order_id;

            $order_id_array = str_split($last_order_id,6);

            $order_id_number = $order_id_array[1];

            $counter = str_pad((int)$order_id_number+1, 4 ,"0",STR_PAD_LEFT);

            $new_order_id = $format.$counter;

        }
        else{

            $new_order_id = $format."0001";

        }


        for($i=0;$i<(count($request->product_name));$i++){
            
            $productcode = $request->product_code[$i];
            $productname = $request->product_name[$i];
            $mrp_price = floatval($request->mrp_price[$i]);
            $unit_price = floatval($request->unit_price[$i]);
            $sgst_tax = floatval($request->sgst_tax[$i]);
            $cgst_tax = floatval($request->cgst_tax[$i]);
            $utgst_tax = floatval($request->utgst_tax[$i]);
            $cess_tax = floatval($request->cess_tax[$i]);
            $apmc_tax = floatval($request->apmc_tax[$i]);
            $weight = $request->weight[$i];
            $quantity = $request->quantity[$i];
            $unit_total_price = floatval($request->unit_total_price[$i]);
            $unit_total_tax = floatval($request->unit_total_tax[$i]);
            $sub_total = floatval($request->sub_total[$i]);

            $form_data = [

                'order_id'=>$new_order_id,
                'user_id'=>Auth::user()->id,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'email'=>$request->email,
                'address'=>$request->address,
                'city'=>$request->city,
                'state'=>$request->state,
                'country'=>$request->country,
                'zip_code'=>$request->zip_code,
                'product_code'=>$productcode,
                'product_name'=>$productname,
                'mrp_price'=>$mrp_price,
                'unit_price'=>$unit_price,
                'sgst_tax'=>$sgst_tax,
                'cgst_tax'=>$cgst_tax,
                'utgst_tax'=>$utgst_tax,
                'cess_tax'=>$cess_tax,
                'apmc_tax'=>$apmc_tax,
                'weight'=>$weight,
                'quantity'=>$quantity,
                'unit_total_price'=>$unit_total_price,
                'unit_total_tax'=>$unit_total_tax,
                'sub_total'=>$sub_total

            ];

            $checkoutdata = Checkout::create($form_data);

        }
        
        date_default_timezone_set('Asia/Kolkata');
        
        /*
        * Create object for call easepay payment gate API and Pass required data into constructor.
        * Get API response.
        *  
        * param string $_GET['apiname'] - holds the API name.
        * param  string $MERCHANT_KEY - holds the merchant key.
        * param  string $SALT - holds the merchant salt key.
        * param  string $ENV - holds the env(enviroment).
        * param  string $_POST - holds the form data.
        *
        * ##Return values
        *   
        * - return array ApiResponse['status']== 1 successful.
        * - return array ApiResponse['status']== 0 error.
        *
        * @param string $_GET['apiname'] - holds the API name.
        * @param  string $MERCHANT_KEY - holds the merchant key.
        * @param  string $SALT - holds the merchant salt key.
        * @param  string $ENV - holds the env(enviroment).
        * @param  string $_POST - holds the form data.
        *
        * @return array ApiResponse['status']== 1 successful. 
        * @return array ApiResponse['status']== 0 error. 
        *
        */

        /*
        * There are three approch to call easebuzz API.
        *
        * 1. using hidden api_name which is $_POST from form.
        * 2. using pass api_name into URL.
        * 3. using extract html file name then based on file name call API.
        *
        */

        // first way
        $apiname = trim(htmlentities($request->api_name, ENT_QUOTES));

        //second way
        //$apiname = trim(htmlentities($_GET['api_name'], ENT_QUOTES));

        // third way
        // $url_link = $_SERVER['HTTP_REFERER'];
        // $apiname = explode('.', ( end( explode( '/',$url_link) ) ) )[0];
        // $apiname = trim(htmlentities($apiname, ENT_QUOTES));


        /*
        * Based on API call change the Merchant key and salt key for testing(initiate payment).
        */

        //setup test enviroment (testpay.easebuzz.in).
        $MERCHANT_KEY = "2PBP7IABZ2";
        $SALT = "DAH88E3UWQ";
        $ENV = "test";      

        // setup production enviroment (pay.easebuzz.in).
        // $MERCHANT_KEY = "DAPT2VES24";
        // $SALT = "QISW8MS2OI";
        // $ENV = "prod";   
 
        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);

        if($apiname === "initiate_payment"){

            //  print_r($_POST);
            // dump();
            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => T3SAT0B5OL [amount] => 100.0 [firstname] => jitendra [email] => test@gmail.com [phone] => 1231231235 [productinfo] => Laptop [surl] => http://localhost:3000/response.php [furl] => http://localhost:3000/response.php [udf1] => aaaa [udf2] => aa [udf3] => aaaa [udf4] => aaaa [udf5] => aaaa [address1] => aaaa [address2] => aaaa [city] => aaaa [state] => aaaa [country] => aaaa [zipcode] => 123123 )
            */
                
            $postData= array ( 

                "txnid" => $request->txnid,
                "amount" => $request->amount, 
                "firstname" => $request->name, 
                "email" => $request->email, 
                "phone" => $request->mobile, 
                "productinfo" => $request->productinfo, 
                "surl" => $request->surl,
                "furl" => $request->furl, 
                "udf1" => $new_order_id,
                "udf2" => $request->udf2,
                "udf3" => $request->udf3,
                "udf4" => $request->udf4,
                "udf5" => $request->udf5,
                "address1" => $request->address1,
                "address2" => $request->address2,
                "city" => $request->city,
                "state" => $request->state, 
                "country" => $request->country, 
                "zipcode" => $request->zipcode

            );
            
            $result = $easebuzzObj->initiatePaymentAPI($postData);

            print_r(json_encode($result));
  

        }

        else if($apiname === "transaction"){ 

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => TZIF0SS24C [amount] => 1.03 [email] => test@gmail.com [phone] => 1231231235 )

            */
            
            $postData= array ( 

                    "txnid" => $request->txnid,
                    "amount" => $request->amount,  
                    "email" => $request->email, 
                    "phone" => $request->phone

            );

            
            $result = $easebuzzObj->transactionAPI($postData);
            $this->easebuzzAPIResponse($result);
     
        }    

        else if($apiname === "transaction_date" || $apiname === "transaction_date_api"){ 

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [merchant_email] => jitendra@gmail.com [transaction_date] => 06-06-2018 )
            */

            $postData= array( 

                    "merchant_email" => $_POST['jitendra@gmail.com'],
                    "transaction_date" => $_POST['06-06-2018'],  
                   
            );

            $easebuzzObj->transactionDateAPI($postData);

           
                       
        }

        else if($apiname === "refund"){
            
            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
                Array ( [txnid] => ASD20088 [refund_amount] => 1.03 [phone] => 1231231235 [email] => test@gmail.com [amount] => 1.03 )

            */

            $postData = array( 
                    "txnid" => "ASD20088",
                    "refund_amount" => "1.03",
                    "phone" => "1231231235",
                    "email" => "test@gmail.com",
                    "amount" => "1.03" 
            );

            $result = $easebuzzObj->refundAPI($postData);

            $this->easebuzzAPIResponse($result);
                       
        }
        else if($apiname === "payout"){

            /*  Very Important Notes
            * 
            * Post Data should be below format.
            *
               Array ( [merchant_email] => jitendra@gmail.com [payout_date] => 08-06-2018 )
            */

            $postData = array(

                "merchant_email" => "jitendra@gmail.com",
                "payout_date" => "08-06-2018"

            );

            $result = $easebuzzObj->payoutAPI($postData);

            $this->easebuzzAPIResponse($result);
                       
        }
        else{

            echo '<h1>You called wrong API, Pleae try again</h1>';
        }

    }

    /*
    *  Show All API Response except initiate Payment API
    */

    public function easebuzzAPIResponse($data){
        print_r($data);
    }

    
    public function ResponseBuzz(Request $request){

        // salt for testing env
        $SALT = "DAH88E3UWQ";

        /*
        * Get the API response and verify response is correct or not.
        *
        * params string $easebuzzObj - holds the object of Easebuzz class.
        * params array $_POST - holds the API response array.
        * params string $SALT - holds the merchant salt key.
        * params array $result - holds the API response array after valification of API response.
        *
        * ##Return values
        *
        * - return array $result - hoids API response after varification.
        * 
        * @params string $easebuzzObj - holds the object of Easebuzz class.
        * @params array $_POST - holds the API response array.
        * @params string $SALT - holds the merchant salt key.
        * @params array $result - holds the API response array after valification of API response.
        *
        * @return array $result - hoids API response after varification.
        *
        */

        $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
        $result = $easebuzzObj->easebuzzResponse( $_POST );
 
        print_r($result);

    }

    public function getPaymentData(Request $request){

        $form_data=[

            'order_id' => $request->udf1,
            'transaction_id' => $request->txnid,
            'mode' => $request->mode,
            'cardCategory'=>$request->cardCategory,
            'pg_type'=>$request->PG_TYPE,
            'bank_ref_num'=>$request->bank_ref_num,
            'bank_code'=>$request->bankcode,
            'payment_source'=>$request->payment_source,
            'easepayid'=>$request->easepayid,
            'productinfo'=>$request->productinfo,
            'udf1'=>$request->udf1,
            'udf2'=>$request->udf2,
            'udf3'=>$request->udf3,
            'udf4'=>$request->udf4,
            'udf5'=>$request->udf5,
            'udf6'=>$request->udf6,
            'udf7'=>$request->udf7,
            'udf8'=>$request->udf8,
            'udf9'=>$request->udf9,
            'udf10'=>$request->udf10,
            'hash'=>$request->hash,
            'amount'=>$request->amount,
            'net_amount_debit'=>$request->net_amount_debit,
            'deduction_percentage'=>$request->deduction_percentage,
            'cash_back_percentage'=>$request->cash_back_percentage,
            'status'=>$request->status,
            'addedon'=>$request->addedon,
            'error_message'=>$request->error_Message

        ];

        $form_data = Payment::create($form_data);

        if($form_data->status=='success'){

            event(new PaymentEvent('Payment Successful'));

            return view('api.success_trans',compact('form_data'));

        }else{

            event(new PaymentEvent('Payment Failed'));

            return view('api.failed_trans',compact('form_data'));
        }

    } 


    public function getTransaction(Request $request){

        $id = $request->user()->id;

        $credit_data = Transaction::where('user_id',$id)->get();

        $tranactionarr = array();

        if ($credit_data->count()>0) {
            
            foreach ($credit_data as $credit) {
            
                if ($credit->status=='success'){
                    
                    $tranasaction_data = TransferPayout::where('user_id',$id)->where('udf1',$credit->transaction_id)->first(); 
                       
                    $tranactionarr[] = $tranasaction_data;
            
                }

                else{

                    $tranactionarr[] = $credit;
                   
                }

            }

            return response()->json([

                      
                        'code' => 200,
                        'status'=>1,
                        'data'=> $tranactionarr,
                        'message' => 'Successfully get transaction data.',

                    ]); 
        
        }
        else{


           return response()->json([

              
                'code' => 400,
                'status'=>0,
                'message' => 'There is no transaction corresponding this user.',

            ]);  
        }
    }
}
