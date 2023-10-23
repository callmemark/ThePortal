<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\AdminRegister;
use App\Models\AdminAccount;

class AdminRegisterController extends Controller
{   

    public function create(){
        return view('pages/forms/admin_register_page');
    }

    public function store(Request $request){
        $validated_request = $request -> validate([
            'first_name' => 'string|required',
            'middle_name' => 'string|required',
            'last_name' => 'string|required',
            'personal_email' => 'email|required',
            'contact_number' => 'numeric|required',
            'age' => 'integer|required',
            'birthdate' => 'date|required',
            'gender' => 'string|required|in:male,female',
        ]);


        // Check if email already exist
        $email_exist = AdminRegister::where('personal_email', $validated_request['personal_email']) -> get();
        if(!$email_exist -> isEmpty()){
            return redirect(route('admin.register.create')) -> with('error', 'Email Already Exist');
        }

        // Check if data will be created successfully
        $created = AdminRegister::create($validated_request);
        if(!$created){
            return redirect(route('admin.register.create')) -> with('error', 'Error occured whilee creating data');
        }

        return $this -> storeAccount($request, $created -> id);
    }



    private function storeAccount($request, $registration_id){

        $request['admin_register_id'] = $registration_id;
        $request['school_email'] = $request['school_email'] . "@institutionalemail.com";
        $validated_account_request = $request -> validate([
            'admin_register_id' => 'integer|required', 
            'school_email' => 'email|required',
            'password' => 'string|required',
        ]);

        $validated_account_request['role'] = 'admin';

        $validated_repeat_password = $request -> validate([
            'repeat-password' => 'string|required',
        ]);

        if($validated_account_request['password'] != $validated_repeat_password['repeat-password']){
            $delete_register = AdminRegister::where('id', $registration_id) -> delete();

            return redirect(route('admin.register.create')) -> with('error', 'Password did not match');
        }

        $validated_account_request['password'] = Hash::make($validated_account_request['password']);

        $is_account_create = AdminAccount::create($validated_account_request);

        if(!$is_account_create){
            $delete_register = AdminRegister::where('id', $registration_id) -> delete();

            return redirect(route('admin.register.create')) -> with('error', 'Error occured while creating the account');
        }

        // If no errorr occured
        return redirect(route('admin.register.create')) -> with('success', 'New Admin data was recorded');
    }
}
