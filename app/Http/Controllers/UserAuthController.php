<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;

class UserAuthController extends Controller
{
    public function get(Request $request){
        if(auth() -> guard('admin') ->check() || auth() -> guard('student') ->check()){
            return redirect(route('dashboard'));
        }
        return view('signin');
    }
}
