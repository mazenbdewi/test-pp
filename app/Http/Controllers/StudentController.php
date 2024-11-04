<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::all();  
        return view('students.index', compact('students'));  
    }
    

    
    public function create()
    {
        return view('students.create');
    }

    
    public function store(StoreStudentRequest $request)
    {
     
        Student::create($request->all());
        return redirect()->route('students.index');
    }

    
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));

    }
 
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    
    public function update(UpdateStudentRequest $request, $id)
    {
     
        $student = Student::findOrFail($id);  
      //  $student->update($request->all()); 
         $student->update($request->validated());   
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    

   
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
