<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductExpiry extends Model
{
    use HasFactory;

    protected $fillable = [

    	'product_id','productattr_id','aisle','rack','shelf','quantity','mfg_date','expiry_date','on_active','is_active'

    ];

    public  function productName(){

	    return $this->belongsTo('App\Models\Product','product_id','id');	    
	} 

	public  function productAttr(){

	    return $this->belongsTo('App\Models\ProductAttribute','productattr_id','id');	    
	} 
}
