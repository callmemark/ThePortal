<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserDataController extends Controller
{
    public function create(Request $request)
    {   
        // Validate inputs
        $data = $request -> validate([
            'firstname' => 'required|string',
            'middlename' => 'required|string',
            'lastname' => 'required|string', 
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // verify if new user have admin access
        $is_admin_checked = $request -> input('isadmin');
        $set_admin = false;

        if($is_admin_checked){
            $set_admin = true;
        }

        // check if email already exist
        $email_query = UserData::where('email', $request -> email) -> get();

        if($email_query -> isEmpty() == false){
            return redirect(route('signup.form')) -> with('error', 'Email already exist');
        } 

        // Hashed password with Bcrypt algorithm
        $hashed = Hash::make($request -> password);

        $data['password'] = $hashed;
        $data['isadmin'] = $set_admin;

        $new_user = UserData::create($data);

        // if new user creation failed create error session
        if(!$new_user){
            return redirect(route('signup.form')) -> with('error', 'Error creating account');
        }

        return view('signin') -> with('success', 'New account created');
    }



    public function signin(Request $request)
    {
        // forget success and error session
        $request -> session() -> forget(['success'. 'error']);

        // validate form
        $validated_data = $request -> validate([
            'email' => 'string|required',
            'password' => 'string|required',
        ]);

        // Attempt login
        $user = UserData::where('email', $request -> email) -> get() -> first();
        $hashedpassword = $user -> pluck('password')[0];


        //verify password 
        if(auth() -> attempt($validated_data)){
             $request->session()->regenerate();

            session(['user_id' => $user-> pluck('id')[0]]);
            session(['is_admin' => $user-> pluck('isadmin')[0]]);
            return redirect(route('dashboard', ['permission', 'admin'])); 
        }
        
        return view('signin') -> with('error', 'No account found');
    }



    public function getdashboard(UserData $user){
        return view('dashboard', $user);
    }


    public function logout(Request $request){
        $request -> session() -> forget('user_id');
        auth() -> logout();
        $request->session()->invalidate();
        return redirect(route('signin.form'));
    }


    public function signup(){
        return view('signup');
    }
    

}
