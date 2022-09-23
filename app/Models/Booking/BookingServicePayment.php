<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingServicePayment extends Model
{
    use HasFactory;
    protected $table = 'booking_services_payment';
}
