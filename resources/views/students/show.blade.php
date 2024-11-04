<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }
        strong {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007bff;
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #e7f0ff;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #d0e0ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Course ID:</strong> {{ $student->course_id }}</p>
        <a href="{{ route('students.index') }}">Back to List</a>
    </div>
</body>
</html>
