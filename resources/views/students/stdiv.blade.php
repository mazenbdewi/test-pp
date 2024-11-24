<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <p><strong>First Name:</strong> {{ $student->first_name }}</p>
        <p><strong>Middle Name:</strong> {{ $student->middle_name }}</p>
        <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        @if (count($divisions)>0)
        <form action="{{ url('/students/division/'.$student->id)}}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
        <div class="input-group">
    @foreach($divisions as $item)
        <div class="input-group-text">
          <input class="form-check-input mt-0" name="division" type="radio" value={{$item->id}} aria-label="Radio button for following text input">
          {{$item->name}}&nbsp;{{$item->id}}
        </div>
    @endforeach
</div>
<button type="submit">Commit</button>
</form>
@else
<div class="alert alert-warning" role="alert">
    No Divisions
</div>
@endif
        <a href="{{ route('students.index') }}">Back to List</a>
</div>
</body>
</html>
