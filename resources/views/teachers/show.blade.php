<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Teacher Info</title>
</head>
<body> 
    <div class="container">
        <h2 class="my-4" style="color:gray">This is {{ $teacher->name }}'s Info:</h2>

        <!-- Display Teacher Name -->
        <div class="form-group">
            <label><strong>Name:</strong> {{ $teacher->name }}</label>
        </div>

        <!-- Display Teacher Age -->
        <div class="form-group">
            <label><strong>Age:</strong> {{ $teacher->age }}</label>
        </div>

        <!-- Display Teacher's Subject -->
       
       
        <div class="form-group">
            <label><strong>Courses:</strong></label>
            <ul>
                @foreach($teacher->courses as $course)
                    <li>{{ $course->name }}</li>  
                @endforeach
            </ul>
        </div>

 
        <div class="form-group">
            <a class="btn btn-outline-success" href="{{ route('teachers.index') }}">Go Back</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
