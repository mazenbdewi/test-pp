<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Students List</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('students.create') }}" class="add-student">Add New Student</a>
        <table id="students-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course_id }}</td>
                        <td>
                            <a href="{{ route('students.show', $student) }}" class="view-button">View</a>
                            <a href="{{ route('students.edit', $student) }}" class="edit-button">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" >
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
             $('#students-table').DataTable({
                processing: true,
                serverSide: false, 
                pageLength: 5,  
            });
        });
    </script>
</body>
</html>
