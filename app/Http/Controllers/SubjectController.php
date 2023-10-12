<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function create(Request $request){
        $validated_data = $request -> validate([
            'subject' => "string|required",
            'unit' => 'numeric|required',
        ]);

        $ret_data = [
            'subject' => '',
            'unit' => 0.0,
        ];


        $subject_exist = Subject::where('subject', $request -> subject) -> get();
        if($subject_exist -> isEmpty() == false){
            //return $this -> get() ->with('error', 'Subject with the same name already exist');
            return redirect(route('subject.form')) -> with('error', 'Subject with the same name already exist');
        }

        $create_sub = Subject::create($validated_data);
        if(!$create_sub){
            return redirect(route('subject.form')) -> with('error', 'Error occured while adding subject to the database');
        }

        return redirect(route('subject.form')) -> with('success', 'New Suject Added');
    }



    public function get(){
        // Pagination will be added
        $subjects_list = Subject::all();
        return view('subject-manager', ['subjects' => $subjects_list]);
    }



    public function delete(Subject $subject){
        $subject -> delete();
        return redirect(route('subject.form')) -> with('success', 'A subject was deleted'); 
    }



    public function update(Subject $subject, Request $request){
        $validated_data = $request -> validate([
            'subject' => 'string|required',
            'unit' => 'integer|required'
        ]);

        $update_query = $subject -> update($validated_data);
        if(!$update_query){
            return $this -> get();
        }
        return $this -> get();
    }


    public function edit(Subject $subject){
        return view('subject-edit', ['subject' => $subject]);
    }
}