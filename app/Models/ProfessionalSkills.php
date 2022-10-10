<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalSkills extends Model
{
    use HasFactory;
    protected $table = 'professional_skills';
    protected $fillable = [
        'professional_id',
        'skill_id'
    ];
}
