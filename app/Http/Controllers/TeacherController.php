<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Student;

use Illuminate\Http\Request;

class TeacherController extends Controller
{     //teacher_view
    public function TeacherView()
    {
      $student=Student::orderBy('name','ASC')->get();
      $teacher=Teacher::latest()->get();
      return view('teacher_view',compact('teacher','student'));
    }
    //teacher store
    public function TeacherStore(Request $request)
    {
    $request->validate(
            [
                'student_id'=> 'required',
                'teacher_name'=> 'required',
            ],
            [
                'student_id.required'=>'Insert student name',
                'teacher_name.required'=>'Insert teacher name'

            ]
            );
            Teacher::insert([
                'student_id'=>$request->student_name,
                'teacher_name'=>$request->teacher_name

            ]

            );
            return redirect()->back();
    }
}
