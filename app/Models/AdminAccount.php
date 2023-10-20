<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminAccount extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'admin_register_id',
        'school_email',
        'password',
        'role',
    ];
}