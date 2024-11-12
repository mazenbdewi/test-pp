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
        <p><strong>Course ID:</strong> {{ $student->course_id }}</p>
        <p><strong>Address:</strong> {{ $student->address }}</p>
        <p><strong>National ID:</strong> {{ $student->national_id }}</p> 
        <p><strong>College Name:</strong> {{ $student->college_name }}</p>
        <p><strong>Specialization:</strong> {{ $student->specialization }}</p>
        <p><strong>Overall Grade:</strong> {{ $student->overall_grade }}</p>

        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
