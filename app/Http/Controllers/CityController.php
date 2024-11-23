<?php
namespace App\Http\Controllers;
use App\Models\City;
use App\Models\School;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    
    public function index(Request $request)
    {
        $cities=City::simplePaginate(5);
        return view('cities.index',compact('cities'));
    }


    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' ,
            'province' => 'required' ,
            'country' => 'required' ,
            'number_of_schools' => 'required',
            'timezone' => 'required'
         ]);
         $cities=City::create($request-> all());
         return redirect()->route('cities.index')->with('success','City added successfuly');
    }

    public function show(City $city ,$id)
    {
        $city = City::findOrFail($id);
        return view('cities.show', compact('city'));
    }

    public function schoolInCityShow(City $city ,$city_id)
    {
        $city = City::findOrFail($city_id);
        $schools = $city->schools;
        return view('cities.schoolInCityShow', compact('schools'));
    }
    

    public function edit(City $city,$id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit',compact('city'));
    }

    public function update(Request $request, City $city,$id)
    {
        $request->validate([
            'name' => 'required' ,
            'province' => 'required' ,
            'country' => 'required' ,
            'number_of_schools' => 'required',
            'timezone' => 'required'
         ]);
         $city = City::findOrFail($id);
         $city->update($request-> all());
         return redirect()->route('cities.index')->with('success','City Updated successfuly');
    }

    public function destroy(City $city ,$id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('cities.index')->with('success','Deleted successfuly');
    }
}
