<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use App\Models\Division;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('name')->simplePaginate(12);
        return view('schools.index', compact('schools'))
		->with('i',(request()->input('page',1)-1)*12);
    }
    public function create()
    {
        return view('schools.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
			'address'=>'required',
            'photo'=>'required|image'
        ]);
        // School::create($request->all());
        //store the photo file
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/schools/',$newPhoto);
        $school = School::create([
            'name' => $request->name,
			'type'=> $request->type,
			'address'=>$request->address,
            //store the photo path in db
            'photo' => '/uploads/schools/'.$newPhoto
        ]);
        return redirect('schools')->with('success', 'School created successfully.');

    }
    public function viewStudents($id){
        $school=School::find($id);

        // dd($school);
        $divisions=$school->divisions;
        //  dd($divisions);
         if(count($divisions)==0){
            // dd($divisions);
            return redirect('schools')->with('success', 'School is empty.');
         }else{
        $students=$divisions->first()->students;
        // dd($students);
        foreach($divisions as $item){
            $students=$students->union($item->students);
        }
    }
//  dd($students);

        // $students=Student::where('school_id',$id)->get();

        return view('students.index', compact('students'));
    }
    public function show($id)
    {
        $school = School::findOrFail($id);
        $divisions = Division::where('school_id',$id)->simplePaginate(12);
        $divisions_seats = Division::where('school_id',$id)->get()->sum('seats');
        // dd($divisions_seats);
        $students_count=Student::where('school_id',$id)->get()->count('id');
        // dd($students_count);
        $empty_seats=$divisions_seats-$students_count;
                //  dd($empty_seats);
        $students=Student::where('school_id',$id)->get();
        // dd($students);
        return view('schools.show')
        ->with('school',$school)
        ->with('divisions',$divisions)
        ->with('students',$students)
        ->with('empty_seats',$empty_seats)
        ->with('i',(request()->input('page',1)-1)*12);

    }
    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('schools.edit', compact('school'));

    }
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        // dd($request);
        $request->validate([
            'name'=>'required',
            'type'=>'required',
			'address'=>'required',
            'photo'=>'required|image'
        ]);
        //try isset($request -> photo)
        if($request->has('photo')){
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/schools/',$newPhoto);
            $school->photo = 'uploads/schools/'.$newPhoto;
        }

        $school->name = $request->name;
        $school->type = $request->type;
        $school->address = $request->address;
        //  $school->photo = $request->photo;
        $school->save();
        return redirect('schools')->with('success', 'School updated successfully.');
    }
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        return redirect('schools')->with('success', 'school deleted successfully.');

    }
}
