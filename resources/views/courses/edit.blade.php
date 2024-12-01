<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ُEdit Course</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Course</h1>
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


        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" value="{{ $course->course_name }}" >

            <label for="class">Class:</label>
            <input type="text" name="class" value="{{ $course->class }}">

            <label for="teacher_name">Teacher Name:</label>
            <input type="text" name="teacher_name" value="{{ $course->teacher_name }}" >

            <label for="year">Year:</label>
            <input type="date" name="year" value="{{ $course->year }}" >


            <button type="submit">Update Course</button>
        </form>
        <a href="{{ route('courses.index') }}">Back to List</a>
    </div>
</body>
</html>