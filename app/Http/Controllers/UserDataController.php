<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserData;
use App\Models\StudentAccount;

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

        // check if email already exist
        $email_query = UserData::where('email', $data['email']) -> get();
        if($email_query -> isEmpty() == false){
            return redirect(route('signup.form')) -> with('error', 'Email already exist');
        } 

        $data['role'] = 'admin';
        
        // Hashed password with Bcrypt algorithm
        $hashed = Hash::make($request -> password);
        $data['password'] = $hashed;

        // create new user
        $new_user = UserData::create($data);

        // if new user creation failed create error session
        if(!$new_user){
            return redirect(route('signup.form')) -> with('error', 'Error creating account');
        }

        // if user is created, redirect to signin page
        return redirect(route('signin.form')) -> with('success', 'New user account was created');
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

        $acc_type_validation = $request -> validate([
            'account-type' => 'string|required',
        ]);


        if($acc_type_validation['account-type'] == 'admin'){
            return $this -> signinAdmin($request, $validated_data);
        } else if($acc_type_validation['account-type'] == 'student'){
            return $this -> signinStudent($request, $validated_data);
        } else {
            return redirect(route('signin.form')) -> with('error', 'undefined Accont type encountered');
        }
    }


    public function signinAdmin($request, $validated_data){
        if(auth() -> guard('admin') -> attempt($validated_data)){
            $request->session()->regenerate();
            session(['role' => 'admin']);

            return redirect(route('dashboard'));
        }

        return redirect(route('signin.form')) -> with('error', 'No account found');
        //return view('signin') -> with('error', 'No account found');
    }



    public function signinStudent($request, $validated_data){
        if(auth() -> guard('student') -> attempt($validated_data)){
            $request->session()->regenerate();
            session(['role' => 'student']);
            return redirect(route('dashboard'));
        }
        return redirect(route('signin.form')) -> with('error', 'No account found');
        //return view('signin') -> with('error', 'No account found');
    }



    public function updateEmail(Request $request, UserData $user_data){
        $validated_data = $request -> validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $old_email = auth()->user()->email;

        $user_account = [
            'email' => $old_email,
            'password' => $validated_data['password']
        ];

        if(auth() -> attempt($user_account)){
            $request->session()->regenerate();
            $user_data -> update(['email' => $validated_data['email']]);
            return redirect(route('dashboard')) -> with('success', 'User Email Data updated');
        }
        
        return redirect(route('dashboard')) -> with('error', 'Failed to update user data');
    }



    public function updatePassword(Request $request, UserData $user_data){
        $validated_data = $request -> validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'newpassword' => 'required|string',
            'newpassword-repeat' => 'required|string',
        ]);

        // check if new password and password repeat is equal
        if($validated_data['newpassword'] != $validated_data['newpassword-repeat']){
            return redirect(route('dashboard')) -> with('error', 'Password repeat did not match');
        }

        // Attempt to authenticate user input
        $user_account = [
            'email' => $validated_data['email'],
            'password' => $validated_data['password']
        ];

        if(auth() -> attempt($user_account)){
            $hashed_pwd = Hash::make($validated_data['newpassword']);
            $user_data -> update(['password' => $hashed_pwd]);
            $request->session()->regenerate();
            return redirect(route('dashboard')) -> with('success', 'User Password Data updated');
        }

        // if authentication failed, redirect
        return redirect(route('dashboard')) -> with('error', 'Failed to update user data. Please check your input');
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
