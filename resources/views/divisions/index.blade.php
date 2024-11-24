@extends("schools.layout")
@section("content")
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
@if (count($divisions)>0)
<br/>
<table id="divisions">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Seats</th>
            <th>Type</th>
            <th>Level</th>
            <th>Schoolnumber</th>
            <th>Students</th>
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
    <td><a  href="{{ url('/school/division/show/'.$item->id) }}">View Students</a></td>
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
@endsection

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
</script>
