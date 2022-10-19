<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserSubscription extends Model
{
    use HasFactory;
    protected $table = 'user_subscriptions';

    protected $fillable = [
        'user_id',
        'membership_id' ,
        'membership_name' ,
        'payment_id',
        'payment_status',
        'start_date',
        'end_date',
        'mrp',
        'discount_price',
        'paid_price',
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->end_date = $post->getExpiryDate($post->start_date,$post->getSubscriptionPlanByID($post->membership_id)->months);
            $post->save();
        });
    }

    private function getSubscriptionPlanByID($membership_id){
        return Subscription::where('id',$membership_id)->first();
    }

    private function getExpiryDate($start_date,$months){
        return date('Y-m-d', strtotime("+".$months." months", strtotime($start_date)));
    }

    public function planDetail()
    {
        return $this->belongsTo('App\Models\Subscription','membership_id','id');
    }
}
