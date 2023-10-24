<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AdminAccount;

class AdminAccountController extends Controller
{
    public function create(){
        return view('pages/forms/admin_login_page');
    }

    public function login(Request $request){
        $validated_request = $request -> validate([
            'school_email' => 'string|required',
            'password' => 'string|required'
        ]);

        if(Auth::guard('admin') -> attempt($validated_request)){
            $request -> session() -> regenerate();
            session(['role' => 'admin']);
            session(['user_data' => AdminAccount::find(auth()->guard('admin')->user()->admin_register_id) -> admin_register]);

            return redirect(route('admin.register.create'));
        }

        return redirect(route('login.admim.create')) -> with('error', 'Check email and password');
    }
}
