<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ajax;


class AjaxController extends Controller
{
    // //
    // public function index(){
    // return view('ajax');
    // }
    // public function fetchstudent()
    // {
    //     $students = Ajax::all();
    //     return response()->json([
    //         'students'=>$students,
    //     ]);
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'path'=> 'required',
    //         'course'=>'required',
    //         'email'=>'required',
    //         'phone'=>'required',
    //     ]);
    //     $image = new Image;

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
            
    //         $student = new Ajax;
    //         // $student->name = $request->input('name');
    //         $student->course = $request->input('course');
    //         $student->email = $request->input('email');
    //         $student->phone = $request->input('phone');
    //         $student->save();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Student Added Successfully.'
    //         ]);
    //     }

    // }

    // public function edit($id)
    // {
    //     $student = Ajax::find($id);
    //     if($student)
    //     {
    //         return response()->json([
    //             'status'=>200,
    //             'student'=> $student,
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Student Found.'
    //         ]);
    //     }

    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'=> 'required|max:191',
    //         'course'=>'required|max:191',
    //         'email'=>'required|email|max:191',
    //         'phone'=>'required|max:10|min:10',
    //     ]);

    //     if($validator->fails())
    //     {
    //         return response()->json([
    //             'status'=>400,
    //             'errors'=>$validator->messages()
    //         ]);
    //     }
    //     else
    //     {
    //         $student = Ajax::find($id);
    //         if($student)
    //         {
    //             $student->name = $request->input('name');
    //             $student->course = $request->input('course');
    //             $student->email = $request->input('email');
    //             $student->phone = $request->input('phone');
    //             $student->update();
    //             return response()->json([
    //                 'status'=>200,
    //                 'message'=>'Student Updated Successfully.'
    //             ]);
    //         }
    //         else
    //         {
    //             return response()->json([
    //                 'status'=>404,
    //                 'message'=>'No Student Found.'
    //             ]);
    //         }

    //     }
    // }

    // public function destroy($id)
    // {
    //     $student = Ajax::find($id);
    //     if($student)
    //     {
    //         $student->delete();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>'Student Deleted Successfully.'
    //         ]);
    //     }
    //     else
    //     {
    //         return response()->json([
    //             'status'=>404,
    //             'message'=>'No Student Found.'
    //         ]);
    //     }
    // }
    public function index(){
         return view('imageajax');
         }
         public function store(Request $request)
         {
            $validator = Validator::make($request->all(), [
                        'name'=> 'required',
                        'phone'=>'required',
                        'image'=>'required',
                      
                    ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
             {
                 $employee=new Ajax;
                 $employee->name=$request->input('name');
                 $employee->phone=$request->input('phone');
                 if ($request->hasFile('image')) {
                      $file=$request->file('image');
                      $extension = $file->getClientOriginalExtension();
                      $filename=time().'.'.$extension;
                      $file->move('uploads/employee/',$filename);
                      $employee->image= $filename;
                 }
                 $employee->save();
                 return response()->json([
                    'status'=>200,
                    'message'=>'Employee Image Data Updated Successfully.'
                ]);

             }

         }
}
