<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;
    protected $table = 'coupon_code';

    protected $fillable = [
        'name',
        'coupon',
        'amount',
        'price_limit'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->coupon = $post->generateCouponCode();
            $post->save();
        });
    }

    private function generateCouponCode()
    {
        $string = '1234567890$#@%ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($string), 0, 10);
    }
}
