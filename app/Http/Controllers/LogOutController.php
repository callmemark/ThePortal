<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogOutController extends Controller
{
    public function logout(Request $request, $role){
        Auth::guard($role) -> logout();

        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/');
    }
}
