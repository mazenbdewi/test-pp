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
        <h1>Add New Student</h1>
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

            <button type="submit">Add Student</button>
        </form>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
