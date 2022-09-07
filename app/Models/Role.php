<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name','modules','sub_modules','is_view','is_add','is_edit','is_delete'

    ];

}
