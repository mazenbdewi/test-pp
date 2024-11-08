@extends("schools.layout")
@section("content")
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
@php
    $i=0;
@endphp




@if (count($schools)>0)



<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>img</th>
            <th>Name</th>
            <th>Type</th>
            <th>Capacity</th>
            <th>Rooms Number</th>
            <th>Address</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
    </thead>
    @foreach($schools as $item)
    <td>{{++$i}}</td>
    <td>
        <img src="{{URL::asset($item->photo)}}" alt="{{$item->photo}}" class="img-tumbnail" width="50" height="50"/>
    </td>
    <td>{{$item->name}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->capacity}}</td>
    <td>{{$item->rooms_num}}</td>
    <td>{{$item->address}}</td>

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
@endsection
