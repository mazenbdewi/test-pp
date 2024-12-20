<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachrs=Teacher::all();
        return view('teachers.index',compact('teachrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show',compact('teacher'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => ['required','max:12'] ,
            'age' => ['required','max:2'] ,
            'subject_name' => ['required']
         ]);
         $teacher->update($request-> all());
         return redirect()->route('teachers.index')->with('success','Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Delete is done');
    }
}
