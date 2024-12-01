<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses List</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Courses List</h1>

        <a href="{{ route('courses.create') }}" class="add-course">Add New Course</a>

        <div class="table-container">
            <table id="course-table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Class</th>
                        <th>Teacher Name</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->class }}</td>
                            <td>{{ $course->teacher_name }}</td>
                            <td>{{ $course->year }}</td>
                            <td>
                                <a href="{{ route('courses.show', $course->id) }}" class="view-button">View</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="edit-button">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>