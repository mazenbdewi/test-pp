<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Course</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Add New Course</h1>
        
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

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" required>

            <label for="class">Class:</label>
            <input type="text" name="class" required>

            <label for="teacher_name">Teacher Name:</label>
            <input type="text" name="teacher_name" required>

            <label for="year">Year:</label>
            <input type="date" name="year" required >

            <button type="submit">Add Course</button>
        </form>
        <a href="{{ route('courses.index') }}">Back to List</a>
    </div>
</body>
</html>