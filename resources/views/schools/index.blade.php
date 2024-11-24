@extends("schools.layout")
@section("content")
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
@if (count($schools)>0)
<br/>
<table id="schools">
    <thead>
        <tr>
            <th>No</th>
            <th>img</th>
            <th>Name</th>
            <th>Type</th>
            <th>Address</th>
            <th>View Students</th>
            <th>Add Division</th>
            <th>Divisions</th>
            <th>Add Student</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
    </thead>
    @foreach($schools as $item)
    <td>{{$loop->iteration}}</td>
    <td>
        <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="50" height="50"/>
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->address}}</td>
    <td><a  href="{{ url('/school/view/students/'.$item->id) }}">View Students</a></td>
    <td><a  href="{{ url('/school/division/add/'.$item->id) }}">Add Devision</a></td>
    <td><a  href="{{ url('/school/division/view/'.$item->id) }}">View Devisions</a></td>
    <td><a href="{{ url('student/create/school/'.$item->id) }}">Add Student</a></td>
    <td>
        <form action="{{ url('/school/del/'.$item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary d-inline p-2">Delete</button>
        </form>
    </td>
    <td><a  href="{{ url('/school/edit/'.$item->id) }}">Edit</a></td>
    <td><a  href="{{ url('/school/show/'.$item->id) }}">Show</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<div class="alert alert-warning" role="alert">
    No Schools
</div>
@endif
{{-- {!! $schools->links()!!} --}}
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#schools').DataTable({
            processing: true,
            serverSide: false,
            pageLength: 12,
        });
    });
</script>
