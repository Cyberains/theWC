<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GSTRate extends Model
{
    use HasFactory;

    protected $fillable = [

    	'gst_type','gst_rate'

    ];
}
