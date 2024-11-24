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
    @if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
    <div class="container">
        <h1>Students List</h1>

        {{-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

        {{-- <a href="{{ route('students.create') }}" class="add-student">Add New Student</a> --}}

        <div class="table-container">
            <table id="students-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course ID</th>
                        <th>Address</th>
                        <th>School Num</th>
                        <th>Division Num</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course_id }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->school_id }}</td>
                            <td>{{ $student->division_id }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="view-button">View</a>
                                <a href="{{ route('students.edit', $student->id) }}" class="edit-button">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button">Delete</button>
                                </form>
                                {{-- <a href="{{ url('/students/addtodivision/'.$student->id)}}" class="edit-button">Add To Div</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
