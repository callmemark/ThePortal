<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function logout(Request $request){
        Auth::guard('admin') -> logout();

        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/');
    }
}
