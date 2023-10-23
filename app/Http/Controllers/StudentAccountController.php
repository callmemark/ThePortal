<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\StudentAccount;

class StudentAccountController extends Controller
{
    public function create(){
        return view('pages/forms/student_login_page');
    }

    public function login(Request $request){
        $validated_request = $request -> validate([
            'school_email' => 'string|required',
            'password' => 'string|required'
        ]);

        if(Auth::guard('student') -> attempt($validated_request)){
            $request -> session() -> regenerate();

            return redirect(route('admin.register.create'));
        }

        // If Error
        return redirect(route('student.login.create')) -> with('error', 'Check email and password');
    }
}
