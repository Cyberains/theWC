<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @method static select(string[] $array)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name','role','mobile','mobile_status','mobile_otp','mobile_otp_expire',
        'email','email_status','email_otp','email_otp_expire','upload_photo','dob',
        'address_id','membership_status','m_start_date','m_end_date','m_payment','m_price','password',
        'is_active','qualification', 'experience', 'working_location','refer_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function addressName(){

        return $this->hasMany('App\Models\Address','user_id','id');

    }

    public  function getDefaultAddress()
    {
        return $this->hasOne('App\Models\Address','user_id','id')->where('is_default',1);
    }
}
