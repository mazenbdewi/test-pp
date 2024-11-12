<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="{{ $student->first_name }}" >

            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name" value="{{ $student->middle_name }}">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ $student->last_name }}" >

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" >

            <label for="course_id">Course ID:</label>
            <input type="number" name="course_id" value="{{ $student->course_id }}" >

            <label for="address">Address:</label>
            <input type="text" name="address" value="{{ $student->address }}">

            <label for="national_id">National ID:</label>
            <input type="text" name="national_id" value="{{ $student->national_id }}">

           
            <label for="college_name">College Name:</label>
            <input type="text" name="college_name" value="{{ $student->college_name }}">

            <label for="specialization">Specialization:</label>
            <input type="text" name="specialization" value="{{ $student->specialization }}">

            <label for="overall_grade">Overall Grade:</label>
            <input type="number" step="0.01" name="overall_grade" value="{{ $student->overall_grade }}">

            <button type="submit">Update Student</button>
        </form>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
