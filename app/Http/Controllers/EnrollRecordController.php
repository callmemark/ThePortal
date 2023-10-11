<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnrollRecord;
use App\Models\StudentRecord;
use App\Models\Subject;


class EnrollRecordController extends Controller
{
    public function create(Request $request, StudentRecord $student){
        // Check if the subject requested is in database
        $subject = json_decode($request -> input('subject-selected'), true);
        $sub_query = Subject::where('id', $subject['id'])->get();
        if($sub_query -> isEmpty()){
            return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('error', 'Subject is not registered in the database');
        }

        $request['subjectid'] = $subject['id'];
        $request['studentid'] = $student -> id;
        $request['grade'] = 0;

        $is_exist_query = EnrollRecord::where('subjectid', $subject['id'])
                                    ->  where('studentid', $student -> id)
                                    ->  get();
        if($is_exist_query){
            return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('error', 'Already enrolled in this subject');
        }


        $validated_data = $request -> validate([
            'subjectid' => 'integer|required',
            'studentid' => 'integer|required',
            'grade' => 'integer|required',
        ]);

        $new_create = EnrollRecord::create($validated_data);

        if(!$new_create){
            return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('error', 'Theres an error while adding data to the databse');
        }

        return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('success', 'Student was enrolled to subjcet: '.$subject['subject']);
    }
}
