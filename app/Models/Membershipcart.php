<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membershipcart extends Model
{
    use HasFactory;
     protected $fillable = ['cart_number'];
    function user(){
    	return $this->hasOne('App\Models\User','id','user_id');
    }
   
}
