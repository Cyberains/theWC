<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id','product_id','service_id','quantity','type'
    ];

    public function getProduct(): HasOne
    {
        return $this->hasOne(Product::class, 'id','product_id');
    }

    public function getService(): HasOne
    {
        return $this->hasOne(Service::class, 'id','service_id');
    }

    public  function productName(){

	   return $this->belongsTo('App\Models\Product','product_id','id')->with('productImage');
	}

	public  function productAttr(){

	    return $this->belongsTo('App\Models\ProductAttribute','productattr_id','id');
	}

	public  function productExpiryName(){

	    return $this->belongsTo('App\Models\ProductExpiry','productexpiry_id','id');

	}

}
