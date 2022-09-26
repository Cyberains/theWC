<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingService extends Model
{
    use HasFactory;
    protected $table = 'booking_services';

    protected $fillable = [
        'booking_id',
        'service_id',
        'mrp',
        'discount',
        'price'
    ];
}
