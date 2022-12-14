<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDocument extends Model
{
    use HasFactory;
    protected $table = 'professional_documents';
    protected $fillable = [
        'professional_id',
        'aadhar_front',
        'aadhar_back'
    ];
}
