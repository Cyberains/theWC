<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralHistory extends Model
{
    use HasFactory;
    protected $table = 'referral_history';

    protected $fillable = [
        'user_id','referred_user_id'
    ];

    public function referredUser(){
        return $this->hasOne(User::class,'id','referred_user_id')->select(['id','mobile']);
    }
}
