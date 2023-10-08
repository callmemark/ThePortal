<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollRecord extends Model
{
    use HasFactory;
    protected $table = 'enrollment_data';

    protected $fillable = [
        'studentid',
        'subjectid',
        'grade'
    ];
}
