<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentRegister;
use App\Models\StudentAccount;


class StudentRegisterController extends Controller
{
    public function create(){
        return view('pages/forms/student_register_page');
    }


    public function store(Request $request){
        $password_validate = $request -> validate([
            'password' => 'string|required',
            'repeat-password' => 'string|required',
        ]);

        if($password_validate['password'] != $password_validate['repeat-password']){
            return redirect(route('student.register.create')) -> with('error', 'Password did not match');
        }

        $validated_request = $request -> validate([
            'first_name' => 'string|required',
            'middle_name' => 'string|required',
            'last_name'  => 'string|required',
            'age'  => 'integer|required',
            'birthdate' => 'date|required',
            'gender' => 'string|required|in:male,female',
            'home_address' => 'string|required',
            'contact_number' => 'numeric|required',
            'personal_email' => 'email|required',
        ]);

        $personal_email_exist = StudentRegister::where('personal_email', $validated_request['personal_email']) -> get();
        if(!$personal_email_exist -> isEmpty()){
            return redirect(route('student.register.create')) -> with('error', 'Personal email already used');
        }

        $new_data_created = StudentRegister::create($validated_request);
        if(!$new_data_created){
            return redirect(route('student.register.create')) -> with('error', 'Error occuered while storing your personal information');
        }

        return $this -> storeAccount($request, $new_data_created -> id);
    }

    public function storeAccount($request, $registered_student_id){
        $request['role'] = 'student';
        $request['student_register_id'] = $registered_student_id;
        $request['school_email'] = $request['school_email'] . "@institutionalemail.com";
        $validated_request = $request -> validate([
            'student_register_id' => 'integer|required',
            'school_email' => 'email|required',
            'password' => 'string|required',
            'repeat-password' => 'string|required', 
            'role' => 'string|required|in:student',
        ]);

        $is_school_email_exist = StudentAccount::where('school_email', $validated_request['school_email']) -> get();
        if(!$is_school_email_exist -> isEmpty()){
            StudentRegister::where('id', $registered_student_id) -> delete();
            return redirect(route('student.register.create')) -> with('error', 'School email already used. Please use different one');
        }

        $validated_request['password'] = Hash::make($validated_request['password']);
        $create_student_account = StudentAccount::create($validated_request);

        if(!$create_student_account){
            StudentRegister::where('id', $registered_student_id) -> delete();
            return redirect(route('student.register.create')) -> with('error', 'Error occured while creating student account.');
        }

         return redirect(route('student.register.create')) -> with('success', 'Student was regoistered and account was created successfully');

    }
}
