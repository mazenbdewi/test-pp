<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('name')->simplePaginate(2);
        return view('schools.index', compact('schools'))
		->with('i',(request()->input('page',1)-1)*2);
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
			'rooms_num'=>'required',
			'capacity'=>'required',
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
			'rooms_num'=> $request->rooms_num,
			'capacity'=> $request->capacity,
			'address'=>$request->address,
            //store the photo path in db
            'photo' => '/uploads/schools/'.$newPhoto
        ]);
        return redirect('schools')->with('success', 'School created successfully.');

    }
    public function show($id)
    {
        $school = School::findOrFail($id);
        return view('schools.show', compact('school'));

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
			'rooms_num'=>'required',
			'capacity'=>'required',
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
        $school->rooms_num = $request->rooms_num;
        $school->capacity = $request->capacity;
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
