<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Image;
class StudentController extends Controller
{
    public function StudentStore(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'image'=>'required'
            ],
            [
                'name.required'=>'student name required',
                'email.required'=>'student email required',
                'image.required'=>'student image required'
            ]);

             // img upload and save
          $image = $request->file('image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
          $save_url = 'upload/brand/'.$name_gen;
          //insert
          Student::insert([
          'name'=>$request->name,
          'email'=>$request->email,
          'slug' => strtolower(str_replace(' ', '-', $request->name)),   
          'image'=> $save_url

           ] );
           return redirect()->route('student.veiw');
          

    }
    //view
    public function StudentVeiw()
    {
        $student =Student::latest()->get();
        return view('studentview', compact('student'));         
    }
    //edit
    public function StudentEdit($id)
    {
        $edit= Student::findOrFail($id);
        return view('student_edit',compact('edit'));

    }
    //update
    public function StudentUpdate(Request $request)
    {
        $student_id=$request->id;
        $old_img=$request->image;
        //image
        if($request->file('image'))
        {
          unlink( $old_img);
          $image = $request->file('image');
          $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
          $save_url = 'upload/brand/'.$name_gen;

          //update
          Student::findOrFail( $student_id)->update(
              ['name'=>$request->name,
              'slug' => strtolower(str_replace(' ', '-', $request->name)),
              'email'=>$request->email]

          );

        }
        else{
            Student::findOrFail( $student_id)->update(
                ['name'=>$request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'email'=>$request->email]
  
            );
        }
        return redirect()->route('student.veiw');
    }
    //delete
    public function StudentDelete($id)
    {
        $delete = Student::findOrFail($id);

        $img = $delete->image;
        unlink($img);

      Student::findOrFail($id)->delete();
      return redirect()->back();
    }
   
}
