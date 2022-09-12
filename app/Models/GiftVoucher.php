<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftVoucher extends Model
{
    use HasFactory;

    protected $table = 'gift_voucher';

    protected $fillable = [
        'name',
        'code',
        'amount',
        'price_limit'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->code = $post->generateVoucherCode();
            $post->save();
        });
    }

    private function generateVoucherCode()
    {
        $string = '1234567890$#@%ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($string), 0, 10);
    }
}
