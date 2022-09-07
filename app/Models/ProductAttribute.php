<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [

    	'product_id','barcode_id','unit','unit_check','mrp_price','selling_price','membership_price','basic_price','cost_price','eb_cost_price','offer_status','is_active'

    ]; 

    public  function productName(){

	    return $this->belongsTo('App\Models\Product','product_id','id');

	}
	
	public  function productExpiry(){

	    return $this->hasMany('App\Models\ProductExpiry','productattr_id','id');	    
	}

	//Accessor

	public function getMrpPriceAttribute($value){

		return floatval(number_format($value,2));
	}

	public function getSellingPriceAttribute($value){

		return floatval(number_format($value,2));
	}

	public function getMembershipPriceAttribute($value){

		return floatval(number_format($value,2));
	}

	public function getBasicPriceAttribute($value){

		return floatval(number_format($value,2));
	}

	public function getEbCostPriceAttribute($value){

		return floatval(number_format($value,2));
	}

}
