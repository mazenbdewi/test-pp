<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">   -->
    <title>Course Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Course Details</h1>

        <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
        <p><strong>Class:</strong> {{ $course->class }}</p>
        <p><strong>Teacher Name:</strong> {{ $course->teacher_name }}</p>
        <p><strong>Year:</strong> {{ $course->year }}</p>

        <a href="{{ route('courses.index') }}">Back to List</a>

    </div>
</body>
</html>