<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [

    	'order_id','user_id','name','mobile','email','address','city','state','country','zip_code','product_code','product_name','mrp_price','unit_price','sgst_tax','cgst_tax','utgst_tax','cess_tax','apmc_tax','weight','quantity','unit_total_price','unit_total_tax','sub_total','status'

    ];
}
