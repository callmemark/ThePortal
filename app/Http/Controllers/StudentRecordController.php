<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\StudentAccount;
use App\Models\StudentRecord;
use App\Models\Subject;



use App\Http\Middleware\AdminPrivellage;


class StudentRecordController extends Controller
{
    public function create(Request $request){
        $request -> session() -> forget(['success'. 'error']);
        $validated_data = $request -> validate([
            'firstname' => 'string|required',
            'middlename' => 'string|required',
            'lastname' => 'string|required',
            'age' => 'numeric|required',
            'gender' => 'string|required',
        ]);

        $new_record = StudentRecord::create($validated_data);
        if(!$new_record){
            return redirect(route('student.register.form')) -> with('error', 'Error while creating student data');
        }

        $student_account = [
            'studentid' => $new_record -> id,
            'email'=> strtolower($validated_data['lastname']) . '@studentmail.com',
            'password' => Hash::make(strtolower($validated_data['lastname'])),
            'role' => 'student',
        ];

        $new_student_account = StudentAccount::create($student_account);
        if(!$new_student_account){
            // if the creation of student account failed, the added student record will also be deleted to make sure all student will have both record and account
            $new_record -> delete();
            return redirect(route('student.register.form')) -> with('error', 'Error while creating student data');
        }

        return redirect(route('student.list'));
    }



    public function getAll(){
        $student_record = StudentRecord::all();
        return view('student-list', ['students' => $student_record]);
    }



    public function edit(Request $request, StudentRecord $student){
        $validated_data = $request -> validate([
            'firstname' => 'string|required',
            'middlename' => 'string|required',
            'lastname' => 'string|required',
            'age' => 'numeric|required',
            'gender' => 'string|required',
        ]);

        $student -> update($validated_data);
        return $this->getAll();
    }



    public function getedit(Request $request, StudentRecord $student){
        $subjects = Subject::all();
        return view('student-edit', ['student' => $student, 'subjects' => $subjects]);
    }



    public function delete(StudentRecord $student){
        $student -> delete();
        return redirect(route('student.list'));
    }



    public function registerForm(){
        return view('student-register');
    }
}
