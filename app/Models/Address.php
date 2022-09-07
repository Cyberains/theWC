<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id','address_type','name','mobile','email','house_no','area','landmark','zipcode','city',
        'state','country','is_active'

    ];

}
