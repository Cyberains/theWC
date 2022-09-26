<?php

namespace App\Models\Booking;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'professional_id',
        'user_service_address_id',
        'time_slot',
        'date_slot'
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
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function professional(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'professional_id');
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }

    public function bookingAddress(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'user_service_address_id');
    }

}
