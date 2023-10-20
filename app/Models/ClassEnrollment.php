<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_register_id',
        'instructor_subject_mapping_id',
        'admin_creator_id',
        'classroom',
    ];
}
