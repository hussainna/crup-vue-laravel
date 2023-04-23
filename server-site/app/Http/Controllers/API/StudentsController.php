<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\students;

class StudentsController extends Controller
{
    public function index()
    {
        $student=students::all();
        return response()->json([
            'status'=>200,
            'message'=>'fetch students from database',
            'students'=>$student,
        ]);
    }
    public function insert(Request $request)
    {
        $student=new students();
        $student->Name=$request->input('name');
        $student->Course=$request->input('course');
        $student->Email=$request->input('email');
        $student->Phone=$request->input('phone');
        $student->save();

        return response()->json([
            'status'=>200,
            'message'=>'the student successfully insert',
        ]);
    }
    public function edit($id)
    {
        $student=students::find($id);
        return response()->json([
            'status'=>200,
            'message'=>'edit student',
            'students'=>$student,
        ]);
    }
    public function update(Request $request,$id)
    {
        $student=students::find($id);
        $student->Name=$request->input('name');
        $student->Course=$request->input('course');
        $student->Email=$request->input('email');
        $student->Phone=$request->input('phone');
        $student->update();

        return response()->json([
            'status'=>200,
            'message'=>'the student successfully update',
        ]);
    }
    public function delete($id)
    {
        $student=students::find($id);
        $student->delete();
        return response()->json([
            'status'=>200,
            'message'=>'the student delete',
        ]);
    }
}
