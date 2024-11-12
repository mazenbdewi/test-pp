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
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="course_id">Course ID:</label>
            <input type="number" name="course_id" required>

            <button type="submit">Add Student</button>
        </form>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
