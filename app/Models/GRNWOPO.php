<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GRNWOPO extends Model
{
    use HasFactory;

    protected $fillable = [

    	'lr_number','supplier_id','supplier_name','carrier_name','invoice_number','invoice_date','invoice_value','delivery_date','remark','barcode','product_name','quantity','mrp_price','unit_price','cost_price','sv_sell_price','eb_sell_price','weight','unit','unit_tax','unit_gst','unit_others','sgst','cgst','igst','ugst','cess','apmc','hsn_sac','discount','mfg_date','exp_date','tax','amount','sub_total','total_tax','grand_total'

    ];


    public  function supplierName(){

	    return $this->belongsTo('App\Models\Supplier','supplier_id','id');	    
	}
}
