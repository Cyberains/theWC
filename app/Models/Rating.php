<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rating extends Model
{
    use HasFactory;

    public function getService(): HasOne
    {
        return $this->hasOne(Service::class, 'id','service_id');
    }

    public function getUser(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
