<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OfferOfTheDay extends Model
{
    use HasFactory;

    protected $table = 'offer_of_the_day';

    protected $fillable = [
        'slug', 'name', 'base_path', 'image', 'terms_and_conditions', 'offer_value',
        'offer_value_type', 'type', 'min_price', 's_time', 'e_time', 'is_active'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->name);
            $post->save();
        });
    }
    private function generateSlug($str)
    {
        if (static::whereSlug($slug = Str::slug($str))->exists()) {
            $max = static::whereSlug($str)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-".Str::random(6);
        }
        return $slug;
    }
}
