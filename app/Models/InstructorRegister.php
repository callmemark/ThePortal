<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'birthdate',
        'gender',
        'home_address',
        'contact_number',
        'personal_email',
        'civil_status',
        'nationality',
    ];
}
