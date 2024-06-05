<?php

namespace App\Http\Controllers;

use App\Models\Student; 
use App\Models\Group; 
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()  
    {
        $students = Student::all(); 
        $groups = Group::all(); 
        return view('index', compact('students', 'groups'));
    }

    public function create() 
    {
        $groups = Group::all(); 
        return view('create', compact('groups')); 
    }

    public function store(Request $request) 
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required', 
            'group_id' => 'required|exists:groups,id', 
             'date_of_birth' => 'required|date',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index'); 
    }
}
