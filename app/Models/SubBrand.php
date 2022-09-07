<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBrand extends Model
{
    use HasFactory;

    protected $fillable = [

    	'brand_id','title','image','description'

    ]; 

	public  function BrandName(){

	    return $this->belongsTo('App\Models\Brand','brand_id','id');	    
	}
}
