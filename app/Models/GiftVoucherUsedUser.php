<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftVoucherUsedUser extends Model
{
    use HasFactory;

    protected $table = 'gift_voucher_used_user';

    protected $fillable = [
        'user_id',
        'gift_voucher_id'
    ];
}
