@extends("schools.layout")
@section("content")

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
                 <li>{{$item}}</li>
            @endforeach

        </ul>
    </div>
@endif
@php
    $typeArray = ['primary','middle','secondary'];
@endphp
<div class="container text-left">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-header">
              <h1>Edit School</h1>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form method = "POST" action = "{{url('/school/update/'.$school->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="form-group">
            <label for="exampleFormControlInput1">School Name</label>
            <textarea name = "name" class="form-control" rows="1">{{$school->name}}</textarea>
            </div>
          <label for="exampleFormControlSelect1">Select Type</label>
          <select class="form-control" name="type">
            @foreach ($typeArray as $item)
            <option value={{$item}} {{$item===$school->type?"selected":""}}>{{$item}}</option>
            @endforeach
          </select>
    <div class="form-group">
        <label for="exampleFormControlInput1">Rooms Number</label>
        <input name = "rooms_num" type="text" class="form-control" value={{$school->rooms_num}}>
      </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">Capacity</label>
        <input name = "capacity" type="text" class="form-control" value={{$school->capacity}}>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">School Address</label>
        <textarea name = "address" class="form-control" rows="1">{{$school->address}}</textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Photo</label>
        <img src="{{URL::asset($school->photo)}}" alt="{{$school->photo}}" class="img-tumbnail" width="100" height="100"/>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Change the Photo</label>
        <input name = "photo" type="file" class="form-control">
      </div>
          <div class="form-group">
           <button class="btn btn-primary" type="submit">Update School</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection("content")
