<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\AdminAccount;

class AdminAccountController extends Controller
{
    public function create(){
        return view('pages/admin_login_page');
    }

    public function login(Request $request){
        $validated_request = $request -> validate([
            'school_email' => 'string|required',
            'password' => 'string|required'
        ]);

        if(Auth::guard('admin') -> attempt($validated_request)){
            $request -> session() -> regenerate();

            return redirect(route('admin.register.create'));
        }

        return redirect(route('login.admim.create')) -> with('error', 'Check email and password');
    }
}
