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
              <h1>Create School</h1>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form method = "POST" action = "{{url('/school')}}" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">School Name</label>
            <textarea name = "name" class="form-control" rows="1"></textarea>
            </div>
            <label for="exampleFormControlSelect1">Select Type</label>
          <select class="form-control" name="type">
            @foreach ($typeArray as $item)
            <option value={{$item}} >{{$item}}</option>
            @endforeach
          </select>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Address</label>
            <textarea name = "address" class="form-control" rows="1"></textarea>
          </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Photo</label>
      <input name = "photo" type="file" class="form-control">
    </div>
          <div class="form-group">
           <button class="btn btn-primary" type="submit">Add School</button>
          </div>


        </form>
      </div>
    </div>
  </div>


@endsection("content")
