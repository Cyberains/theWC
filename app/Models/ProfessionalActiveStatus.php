<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalActiveStatus extends Model
{
    use HasFactory;

    protected $table = 'professional_active_status';

    protected $fillable = [
        'professional_id',
        'status'
    ];
}
