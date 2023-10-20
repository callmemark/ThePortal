<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorSubjectMapping extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'subject_id',
        'admin_creator_id',  
    ];
}
