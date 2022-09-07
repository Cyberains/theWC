<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description'
    ];
    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->title);
            $post->discounted_price = $post->price- $post->discount;
            $post->save();
        });
    }
    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereSlug($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-".Str::random(6);
        }
        return $slug;
    }

    public function getCategory(): HasOne
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
    public function getSubCategory(): HasOne
    {
        return $this->hasOne(SubCategory::class, 'id','sub_category_id');
    }
}
