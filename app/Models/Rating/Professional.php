<?php

namespace App\Models\Rating;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;
    protected $table = 'professional_rating';

    public function getUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
