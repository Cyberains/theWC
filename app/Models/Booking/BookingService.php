<?php

namespace App\Models\Booking;

use App\Models\Service;
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

    public function bookingServiceBelongToService(){
        return $this->belongsTo(Service::class,'service_id','',Booking::class);
    }
}
