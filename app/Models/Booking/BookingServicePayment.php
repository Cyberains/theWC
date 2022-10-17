<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingServicePayment extends Model
{
    use HasFactory;
    protected $table = 'booking_services_payment';

    protected $fillable = [
        'booking_id','payment_id','payment_status','settlement_date','settlement_status','payed_amount'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            if($post->payment_status == 'done'){
                $post->settlement_date = date('y-m-d',strtotime(date('y-m-d'). ' + 3 days'));
                $post->settlement_status = 'pending';
                $post->save();
            }
        });
    }
}
