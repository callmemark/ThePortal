<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class StudentAccount extends Authenticatable
{
    use HasFactory, HasFactory, Notifiable;

    protected $table = 'student_accounts';

    protected $fillable = [
        'studentid',
        'email',
        'password',
        'role',
    ];
}
