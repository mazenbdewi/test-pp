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


    <div class="card" style="width: 25rem;">
        <img src="{{URL::asset($school->photo)}}" alt="{{$school->photo}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$school->name}}</h5>
            <p class="card-text">School Type : {{$school->type}}.</p>
            <p class="card-text">School Address : {{$school->address}}.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">this school has : {{$empty_seats}} empty seat</li>
          <li class="list-group-item">this school created at : {{$school->created_at->diffForhumans()}}</li>
          <li class="list-group-item">this school updated at : {{$school->updated_at->diffForhumans()}}</li>
        </ul>
      </div>
    </div>
    </div>



    <div class="row">
        <div class="col">
            <div class="float-right">
@if (count($divisions)>0)
<h3>Divisions</h3>
<table id="divisions">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Seats</th>
            <th>Type</th>
            <th>Level</th>
            <th>Schoolnumber</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    @foreach($divisions as $item)
    <td>{{$loop->iteration}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->seats}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->level}}</td>
    <td>{{$item->school_id}}</td>
    <td>
        <form action="{{ url('/school/division/del/'.$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary d-inline p-2">Delete</button>
        </form>
    </td>
    <td><a  href="{{ url('/school/division/edit/'.$item->id) }}">Edit</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<div class="alert alert-warning" role="alert">
    No Divisions
</div>
@endif
{{-- {!! $divisions->links()!!} --}}
</div>


<div class="row">
    <div class="col">
        <div class="float-left">
@if (count($students)>0)
<h3>Students</h3>
<table id="students">
<thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
</thead>
@foreach($students as $item)
<td>{{$loop->iteration}}</td>
<td>{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
<td>{{$item->email}}</td>
<td>
    <form action="{{ route('students.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary d-inline p-2">Delete</button>
    </form>
</td>
<td><a  href="{{ route('students.edit', $item->id) }}">Edit</a></td>
</tr>
@endforeach
</tbody>
</table>
@else
<div class="alert alert-warning" role="alert">
No Students
</div>
@endif
{{-- {!! $divisions->links()!!} --}}
</div>




@endsection("content")

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#divisions').DataTable({
            processing: true,
            serverSide: false,
            pageLength: 12,
        });
    });
    $(document).ready(function() {
        $('#students').DataTable({
            processing: true,
            serverSide: false,
            pageLength: 12,
        });
    });
</script>
