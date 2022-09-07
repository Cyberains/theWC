<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarbageItem extends Model
{
    use HasFactory;
      protected $fillable = [

    	'product_id','productattr_id','qty','weight','unit_tax','unit_gst','unit_others','barcode','hsn_sac','mrp_price','price','discount','expiry_date','tax'

    ]; 
}
