<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [

        'offer_id','product_id','productattr_id','selling_price','today_price','start_date','end_date'
    ];

    public  function productName(){

        return $this->belongsTo('App\Models\Product','product_id','id');        
    } 

    public  function productNameImage(){

        return $this->belongsTo('App\Models\Product','product_id','id')->with('productImage');        
    } 

    public  function productAttrName(){

        return $this->belongsTo('App\Models\ProductAttribute','productattr_id','id');       
    }

    public function getStartDateAttribute($value){

        return date('d-m-Y H:i:s',strtotime($value));
    }

    public function getEndDateAttribute($value){

        return date('d-m-Y H:i:s',strtotime($value));
    }
}
