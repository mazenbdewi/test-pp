<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
     
    public function index()
    {
   
        $teachers = Teacher::with('courses')->get(); 
        return view('teachers.index',compact('teachers'));
    }
 
    public function create()
    {
        $courses = Course::all();
        return view('teachers.create', compact('courses'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:12'],
            'age' => ['required', 'integer', 'max:99'], 
            'courses' => ['required', 'array', 'exists:courses,id'], 
        ]);
    
        $teacher = Teacher::create($request->except('courses'));   
        $teacher->courses()->sync($request->courses); 
        return redirect()->route('teachers.index')->with('success', 'Teacher added successfully');
    }
    
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => ['required', 'max:12'],
            'age' => ['required', 'integer', 'max:99'],
            'courses' => ['required', 'array', 'exists:courses,id'],
        ]);
    
        $teacher->update($request->except('courses'));
        $teacher->courses()->sync($request->courses); 
        return redirect()->route('teachers.index')->with('success', 'Updated successfully');
    }
    

     
    public function show(Teacher $teacher)
    { 
        $teacher->load('courses');  
        return view('teachers.show', compact('teacher'));
    }
 
    public function edit($id)
    {
        $teacher = Teacher::with('courses')->findOrFail($id);
        $courses = Course::all();  
        return view('teachers.edit', compact('teacher', 'courses'));
    }
 
     
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Delete is done');
    }
}
