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
              <h1>Show Division</h1>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="float-right">
@if (count($students)>0)
<h3>Students</h3>
<table id="students">
    <thead>
        <tr>
            <th>No</th>
            <th>first_name</th>
            <th>email</th>
            <th>Show</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    @foreach($students as $item)
    <td>{{$loop->iteration}}</td>
    <td>{{$item->first_name}}</td>
    <td>{{$item->email}}</td>
    <td><a  href="{{ url('students/'.$item->id) }}">Show</a></td>
    <td>
        <form action="{{ url('students/'.$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary d-inline p-2">Delete</button>
        </form>
    </td>
    <td><a  href="{{ url('students/'.$item->id.'/edit') }}">Edit</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<div class="alert alert-warning" role="alert">
    No Students
</div>
@endif
{{-- {!! $students->links()!!} --}}
</div>
<div class="card" style="width: 25rem;">
    <div class="card-body">
        <h5 class="card-title">Division Type : {{$division->name}}</h5>
        <p class="card-text">Division Type : {{$division->type}}.</p>
        <p class="card-text">Seats Number : {{$division->seats}}.</p>
        <p class="card-text">School  : {{$division->school_id}}.</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">this division created at : {{$division->created_at->diffForhumans()}}</li>
      <li class="list-group-item">this division updated at : {{$division->updated_at->diffForhumans()}}</li>
    </ul>
  </div>
</div>
</div>
@endsection("content")

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#students').DataTable({
            processing: true,
            serverSide: false,
            pageLength: 12,
        });
    });
</script>
