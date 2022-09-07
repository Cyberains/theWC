<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

     protected $fillable = [
        
        'supplier_id','purchase_id','seller','ship_to','ship_address','sku_code','product_name','mrp_price','basic_price','quantity','weight','sgst_tax','cgst_tax','igst_tax','ugst_tax','cess_tax','apmc_tax','unit_tax_percentage','tax_price','amount','sub_total','total_tax','grand_total','note','po_delivery_date','advance_payment_type','payment_rupee_percent','advance_payment_amount','expire_status'

    ];

    public  function supplierName(){

	    return $this->belongsTo('App\Models\Supplier','supplier_id','id');	    
	}
}
