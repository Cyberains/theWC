<?php

namespace App\Models;

use App\Models\Booking\BookingServicePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'amount',
        'professional_id',
        'user_service_address_id'
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

    public function bookingAddress(): HasOne
    {
        
        return $this->hasOne(Address::class,'id','user_service_address_id');
    }

    public function servicePaymentStatus(): HasOne
    {
        return $this->hasOne(BookingServicePayment::class,'booking_id','bookingId');
    }

}
