<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'amount',
        'professional_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->bookingId = $post->generateBookingId();
            $post->save();
        });
    }

    private function generateBookingId()
    {
        $string = '1234567890$#ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($string), 0, 10);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function professional(): HasOne
    {
        return $this->hasOne(User::class,'id','professional_id');
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

}
