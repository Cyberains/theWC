<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserSubscription extends Model
{
    use HasFactory;
    protected $table = 'user_subscriptions';

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->plan_amount = $post->getSubscriptionPlanByID($post->subscription_id)->final_price;
            $post->plan_expiry = $post->getExpiryDate($post->created_at,$post->getSubscriptionPlanByID($post->subscription_id)->months);
            $post->save();
        });
    }

    private function getSubscriptionPlanByID($subscription_id){
        return Subscription::where('id',$subscription_id)->first();
    }

    private function getExpiryDate($created_at,$months){
        return date('Y-m-d', strtotime("+".$months." months", strtotime($created_at)));
    }

    public function getSubscriptionPlanDetails(): HasOne
    {
        return $this->hasOne(Subscription::class, 'id','subscription_id');
    }
}
