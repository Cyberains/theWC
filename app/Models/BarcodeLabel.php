<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarcodeLabel extends Model
{

    use HasFactory;

    protected $fillable = [
        
        'product_name','barcode','mrp_price','weight','unit','quantity','status'

    ];
    
}
