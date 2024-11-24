<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Division;
use App\Models\School;

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
    public function createStudent($id)
    {
        $school=School::find($id);
        $divisions = Division::where('school_id',$id)->get();
        return view('students.create',compact('divisions'),compact('school'));
    }


    public function store(StoreStudentRequest $request)
    {
        $division=Division::find($request->division_id);
        $students_number=Student::where('division_id',$request-> division_id)->count();
        if ($division->seats>$students_number) {
            Student::create($request->all());
            return redirect()->route('students.index')->with('success','Student added successfully');
        } else {
            return redirect()->route('students.index')->with('success','division is full');
        }



    }


    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));

    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        //  dd($student->school_id);
        $divisions = Division::where('school_id',$student->school_id)->get();
        //  dd($divisions);
        return view('students.edit', compact('student'),compact('divisions'));
    }


    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        $division=Division::find($request->division);
        $students_number=Student::where('division_id',$request-> division_id)->count();
        if ($division->seats>$students_number) {
            $student->division_id=$request->division;
            $student->save();
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        } else {
            return redirect()->route('students.index')->with('success','division is full');
        }




        // $student->update($request->validated());

    }
    public function addToDivision($id)
    {

        $student = Student::findOrFail($id);
        // dd($student);
        $divisions=Division::get();
        // dd($divisions);
        return view('students.stdiv',compact('student'),compact('divisions'));
    }
    public function commit(Request $request, $id)
    {
// dd($request);
       $student = Student::findOrFail($id);
    //    dd($student);
    //    dd($request->division);
       $student->division_id=($request->division);
       $student->save();
        // $student->update($request->validated());
        return redirect()->route('students.index')->with('success', 'Student divisioned  successfully.');
    }


    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
