<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserData extends Authenticatable
{
    use HasFactory, HasFactory, Notifiable;

    protected $table = 'userdata';
    
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'isadmin'
    ];
}
