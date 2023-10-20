<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class InstructorAccount extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'instructor_register_id',
        'school_email',
        'password',
        'role',
    ];
}
