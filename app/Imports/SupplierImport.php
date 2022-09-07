<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts; 
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Supplier;
use Khsing\World\World;
use Khsing\World\Models\Country;

class SupplierImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
    	       
        foreach ($rows as $row) 
        {
    
            $supplierlastelement = Supplier::latest()->first();

	        if ($supplierlastelement != null) {
	            
	            $supplierid =  $supplierlastelement->supplier_id;
	            $supplieridg = explode("EB",$supplierid)[1]; 

	            $counter = str_pad((int)$supplieridg+1, 3 ,"0",STR_PAD_LEFT);

	            $new_supplieridg = 'EB'.$counter;
	        }
	        else{

	            $new_supplieridg = 'EB001';
	        }  
           
	        	
	    	$product = Supplier::create([

	            'supplier_id'=>$new_supplieridg,
	            'supplier_name'=>$row['supplier_name'],
	            'supplier_address'=>$row['supplier_address'],
	            'supplier_email'=>$row['supplier_email'],
	            'supplier_mobile'=>$row['supplier_mobile'],
	            'gst_in'=>$row['gst_in'],
	            'pan_no'=>$row['pan_no'],
	            'pincode'=>$row['pincode'],
	            'city'=>$row['city'],
	            'state'=>$row['state'],
	            'country'=>$row['countryinindia'],
	            'tax_type'=>$row['tax_typeoptionsnoneinter_stateintra_state'],
	            'po_expiry_duration'=>$row['po_expiry_durationin_days'],
	            'owner_name'=>$row['owner_name'],
	            'owner_number'=>$row['owner_mobile'],
	            'owner_email'=>$row['owner_email'],
	            'spoc_name'=>$row['spoc_name'],
	            'spoc_number'=>$row['spoc_mobile'],
	            'spoc_email'=>$row['spoc_email'],
	            'lead_time'=>$row['lead_timein_days'],
	            'credit_period'=>$row['credit_periodin_days'],
	            'bank_name'=>$row['bank_name'],
	            'ifsc_code'=>$row['ifsc_code'],
	            'branch_name'=>$row['branch_name'],
	            'account_number'=>$row['account_number'],
	            'account_holder_name'=>$row['account_holder_name'],
	            'secondary_email'=>$row['secondary_email'],

	    	]);
      
        }

    }

    public function rules(): array
    {

        $countryarr = array();
       	$country = World::Countries();

        foreach ($country as $m){
           
            array_push($countryarr, $m->code);

        }

        return [

	            'supplier_name'=>'required',
	            'supplier_address'=>'required',
	            'supplier_email'=>'required|email',
	            'supplier_mobile'=>'required|numeric',
	            'gst_in'=>'required|string|size:15',
	            'pan_no'=>'required|string|size:10',
	            'pincode'=>'required|integer|size:6',
	            'city'=>'required|string',
	            'state'=>'required|string',
	            'countryinindia'=>'required|string|in:'.implode(',',$countryarr),
	            'tax_typeoptionsnoneinter_stateintra_state'=>'required|in:none,inter_state,intra_state',
	            'po_expiry_durationin_days'=>'required|numeric',
	            'owner_name'=>'nullable|string',
	            'owner_number'=>'nullable|numeric',
	            'owner_email'=>'nullable|email',
	            'spoc_name'=>'nullable|string',
	            'spoc_number'=>'nullable|numeric',
	            'spoc_email'=>'nullable|email',
	            'lead_timein_days'=>'required|numeric',
	            'credit_periodin_days'=>'required|numeric',
	            'bank_name'=>'required|string',
	            'ifsc_code'=>'required|string',
	            'branch_name'=>'required|string',
	            'account_number'=>'required|numeric',
	            'account_holder_name'=>'required|string',
	            'secondary_email'=>'required|email',
                              
        ];
    }

}
