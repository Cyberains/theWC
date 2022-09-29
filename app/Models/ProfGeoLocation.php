<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfGeoLocation extends Model
{
    use HasFactory;
    protected $table = 'prof_geo_location';
    protected $fillable = [
        'user_id','latitude','longitude'
    ];
}
