<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        
     'supplier_id','supplier_name','supplier_address','supplier_email','supplier_mobile','gst_in','pan_no','pincode','city','state','country','tax_type','po_expiry_duration','owner_name','owner_number','owner_email','spoc_name','spoc_number','spoc_email','lead_time','credit_period','bank_name','ifsc_code','branch_name','account_number','account_holder_name','secondary_email','is_active','balance'

    ];
     public  function suppliersname(){

	    return $this->hasMany('App\Models\Receivepo','suppplierid','supplier_id');	    
	}
}
