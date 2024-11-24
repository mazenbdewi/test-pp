<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Student;
use App\Models\School;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions=Division::simplePaginate(12);
        // dd(count($divisions));
        return view('divisions.index',compact('divisions'))
        ->with('i',(request()->input('page',1)-1)*12);
    }
    public function view($id)
    {
        $divisions=Division::where('school_id',$id)->simplePaginate(12);
        // dd(count($divisions));
        $school=School::where('id',$id)->first();
        return view('divisions.schoold',compact('divisions'))
        ->with('i',(request()->input('page',1)-1)*12)
        ->with('school',$school);
    }
    public function create()
    {
        return view('divisions.create');
    }
    public function add($id)
    {   $school=School::find($id);
        return view('divisions.add',compact('school'));
    }
    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required' ,
        'seats'=>'required',
        'type'=>'required' ,
        'level'=>'required' ,
        'school_id' =>'required'
        ]) ;
        $school=School::find($request->school_id);
        $success='Division not added problem in level entered';
        if ($school===null) {
            $success="alert no school exsists with the entered id";
        }else{
            if($school->type=='primary'){
                if ($request->level>0 && $request->level<7) {
                    $division=Division::create([
                        'name'=>$request->name ,
                        'seats'=>$request->seats ,
                        'type'=>$request->type ,
                        'level'=>$request->level ,
                        'school_id' =>$request->school_id
                        ]);
                        $success='Division added successfully';
                }
            }
            if($school->type=='middle'){
                if ($request->level>6 && $request->level<10) {
                    $division=Division::create([
                        'name'=>$request->name ,
                        'seats'=>$request->seats ,
                        'type'=>$request->type ,
                        'level'=>$request->level ,
                        'school_id' =>$request->school_id
                        ]);
                        $success='Division added successfully';
                }
            }
            if($school->type=='secondary'){
                if ($request->level>9 && $request->level<13) {
                    $division=Division::create([
                        'name'=>$request->name ,
                        'seats'=>$request->seats ,
                        'type'=>$request->type ,
                        'level'=>$request->level ,
                        'school_id' =>$request->school_id
                        ]);
                        $success='Division added successfully';
                }
            }
            }
        return redirect('schools/divisions')->with('success',$success);
    }
    public function show($id)
    {
        $division = Division::findOrFail($id);
        $students = Student::where('division_id',$id)->simplePaginate(12);
        // dd($students);
        return view('divisions.show', compact('division'),compact('students'))
        ->with('i',(request()->input('page',1)-1)*12);

    }
    public function edit($id)
    {
        $division = Division::findorfail($id);
        return view('divisions.edit',compact('division'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required' ,
            'seats'=>'required',
            'type'=>'required' ,
            'level'=>'required' ,
            'school_id' =>'required'
            ]) ;
            $studentsCount=Student::where('division_id',$id)->get()->count();
            // dd($studentsCount);
            $division=Division::find($id);
            if ($studentsCount>$request->seats) {
                 $success='Division not updated problem in capacity entered ';
                 return redirect('schools/divisions')->with('success',$success);

            }
            $school=School::find($request->school_id);
            $success='Division not updated problem in level entered ';
            if ($school===null) {
                $success="alert no school exsists with the entered id";
            }else{
                if($school->type=='primary'){
                    if ($request->level>0 && $request->level<7) {

                            $division->name=$request->name ;
                            $division->seats=$request->seats ;
                            $division->type=$request->type ;
                            $division->level=$request->level ;
                            $division->school_id =$request->school_id;
                            $success='Division updated successfully';
                    }
                }
                if($school->type=='middle'){
                    if ($request->level>6 && $request->level<10) {
                            $division->name=$request->name ;
                            $division->seats=$request->seats ;
                            $division->type=$request->type ;
                            $division->level=$request->level ;
                            $division->school_id =$request->school_id;
                            $success='Division updated successfully';
                    }
                }
                if($school->type=='secondary'){
                    if ($request->level>9 && $request->level<13) {
                            $division->name=$request->name ;
                            $division->seats=$request->seats ;
                            $division->type=$request->type ;
                            $division->level=$request->level ;
                            $division->school_id =$request->school_id;
                            $success='Division updated successfully';
                    }
                }
                }
                $division->save();
            return redirect('schools/divisions')->with('success',$success);
        }
    public function destroy($id)
    {
        $division=Division::findorfail($id);
        $division->delete($id);
        $success="Division deleted successfully";
        return redirect('schools/divisions')->with('success',$success);
    }
}
