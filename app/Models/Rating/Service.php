<?php

namespace App\Models\Rating;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service_rating';

    public function getService(): HasOne
    {
        return $this->hasOne(\App\Models\Service::class, 'id','service_id');
    }

    public function getUser(): HasOne
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
