<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItems extends Model
{
    use HasFactory;

     protected $fillable = [

    	'biller_id','credit_id','retutrn_receipt_id','receipt_id','credit_note_rupees','credit_note_status','barcode','returnqty','receipt_id','product_name','weight','unit_check','unit_tax','unit_gst','unit_others','hsn_sac','mrp_price','price','discount','expiry_date','tax','amount','subtotal','total_tax','grand_total','received_cash',''

    ];

    public function receiptName(){

    	return $this->belongsTo('App\Models\OfflineBilling','receipt_id','receipt_id');

    }

    public function billerName(){

    	return $this->belongsTo('App\Models\User','biller_id','id');

    }
}
