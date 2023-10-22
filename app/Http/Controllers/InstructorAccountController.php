<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\InstructorAccount;


class InstructorAccountController extends Controller
{
   public function create(){
        return view('pages/instructor_login_page');
    }

    public function login(Request $request){
        $validated_request = $request -> validate([
            'school_email' => 'string|required',
            'password' => 'string|required'
        ]);

        if(Auth::guard('instructor') -> attempt($validated_request)){
            $request -> session() -> regenerate();

            return redirect(route('admin.register.create'));
        }

        // If Error
        return redirect(route('instructor.login.create')) -> with('error', 'Check email and password');
    }
}
