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
<div class="container text-left">
    <div class="row">
      <div class="col">
        <div class="card">
            <div class="card-header">
              <h1>Show School</h1>
            </div>
          </div>
      </div>
    </div>

    <div class="row">
        <div class="col">

<div class="card" style="width: 25rem;">
    <img src="{{URL::asset($school->photo)}}" alt="{{$school->photo}}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{$school->name}}</h5>
        <p class="card-text">School Type : {{$school->type}}.</p>
        <p class="card-text">Rooms Number : {{$school->rooms_num}}.</p>
        <p class="card-text">Capacity : {{$school->capacity}}.</p>
        <p class="card-text">School Address : {{$school->address}}.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">this school created at : {{$school->created_at->diffForhumans()}}</li>
      <li class="list-group-item">this school updated at : {{$school->updated_at->diffForhumans()}}</li>
    </ul>
  </div>
</div>
</div>
@endsection("content")
