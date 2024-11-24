<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Add New Student To {{$school->name}} {{$school->type}} School</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (count($divisions)>0)
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" required>

            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="course_id">Course ID:</label>
            <input type="number" name="course_id" required>

            <label for="address">Address:</label>
            <input type="text" name="address">

            <label for="national_id">National ID:</label>
            <input type="text" name="national_id">


            <label for="college_name">College Name:</label>
            <input type="text" name="college_name">

            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization">

            <label for="overall_grade">Overall Grade:</label>
            <input type="number" step="0.01" name="overall_grade">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">School Number</label>
                <textarea name = "school_id" class="form-control" rows="1" readonly>{{$school->id}}</textarea>
            </div>





    <div class="input-group">
    @foreach($divisions as $item)
        <div class="input-group-text">
          <input class="form-check-input mt-0" name="division_id" type="radio" value={{$item->id}} aria-label="Radio button for following text input">
          {{$item->name}}&nbsp;
        </div>
    @endforeach
    </div>

@else
<div class="alert alert-warning" role="alert">
    No Divisions
</div>
@endif




            <button type="submit">Add Student</button>
        </form>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
