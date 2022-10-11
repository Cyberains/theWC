<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewLaunched extends Model
{
    use HasFactory;

    protected $table = 'new_launches';

    protected $fillable = [
        'base_path','banner_image','type','category_id','sub_category_id','service_id','is_active'
    ];
}
