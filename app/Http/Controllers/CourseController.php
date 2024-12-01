<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();  
        return view('courses.index', compact('courses'));  
    }

    public function create()
    {
        return view('courses.create');
    }

  
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->all());
        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);  
        $course->update($request->all()); 
         // $course->update($request->validated());   
         return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index');
    }
}
