<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachrs=Teacher::paginate(5);
        return view('teachers.index',compact('teachrs'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:12'] ,
            'age' => ['required','max:2'] ,
            'subject_name' => ['required']
         ]);
         $teacher=Teacher::create($request-> all());
         return redirect()->route('teachers.index')->with('success','Teacher added successfuly');
    }

    public function show(Teacher $teacher, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show',compact('teacher'));
    }
    
    
    public function edit(Teacher $teacher, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit',compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher, $id)
    {

        $request->validate([
            'name' => ['required','max:12'] ,
            'age' => ['required','max:2'] ,
            'subject_name' => ['required']
         ]);
         $teacher = Teacher::findOrFail($id);
         $teacher->update($request-> all());
         return redirect()->route('teachers.index')->with('success','Updated successfuly');
    }

    public function destroy(Teacher $teacher , $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Deleted successfuly');
    }
}
