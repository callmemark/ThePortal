<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentAccount extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'parent_register_id',
        'school_email',
        'password',
        'role',
    ];
}
