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
    $typeArray = ['primary','alternative'];
@endphp

<div class="container text-left">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-header">
              <h1>Create Division</h1>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form method = "POST" action = "{{url('school/division')}}">
            @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Division Name</label>
            <textarea name = "name" class="form-control" rows="1"></textarea>
            </div>
            <label for="exampleFormControlSelect1">Select Type</label>
          <select class="form-control" name="type">
            @foreach ($typeArray as $item)
            <option value={{$item}} >{{$item}}</option>
            @endforeach
          </select>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Seats</label>
            <textarea name = "seats" class="form-control" rows="1"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Level</label>
            <textarea name = "level" class="form-control" rows="1"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">School Number</label>
            <textarea name = "school_id" class="form-control" rows="1"></textarea>
          </div>
          <div class="form-group">
           <button class="btn btn-primary" type="submit">Add Division</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection("content")
