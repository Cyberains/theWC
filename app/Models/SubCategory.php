<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id', 'title', 'description','base_path','image'

    ];

    public  function categoryName()
    {
        return $this->belongsTo(SubCategory::class, 'category_id', 'id');
    }

    public  function getCategoryName(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
