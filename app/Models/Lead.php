<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'leads';

    protected $fillable = [
        'name',
        'email',
        'area',
        'city',
        'pin_code',
        'professional_qualification',
        'total_work_experience',
        'terms_condition',
        'phone',
        'm_f',
        'latitude',
        'longitude'
    ];
}
