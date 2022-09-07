<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflineBilling extends Model
{
    use HasFactory;

    protected $fillable = [

    	'biller_id','name','mobile','receipt_id','barcode','product_name','weight','unit_check','unit_tax','unit_gst','unit_others','hsn_sac','mrp_price','price','discount','expiry_date','quantity','tax','amount','subtotal','total_tax','cn_status','cn_rupees','cn_number','grand_total','payment_method','received_cash','payment_method1','received_cash1','eb_coupon_method','eb_coupon_cash','status'

    ];
    
    public function billerName(){

    	return $this->belongsTo('App\Models\User','biller_id','id');

    }
}
