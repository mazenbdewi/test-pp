<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>edit</title>
</head>
<body> 
    <div class="container">
        <p style="padding: 10px ; color:gray" >{{$teacher->name}} You can Update your info:</p>
        <form action="{{ route('teachers.update' , $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label >name</label>
              <input type="text" class="form-control" value="{{$teacher->name}}" name="name" placeholder="enter your name">
            </div>
            <div class="form-group">
              <label>age</label>
              <input type="text" class="form-control" value="{{$teacher->age}}" name="age" placeholder="your age">
            </div>
            <div class="form-group">
                <label for=>subject_name</label>
                <input type="text" class="form-control" value="{{$teacher->subject_name}}" name="subject_name" placeholder="your subject_name">
              </div>
            <div class="form-group">
                <button style ="margin-left:50%" type="submit" class="btn btn-info">Save Changes</button>
            </div>
          </form>
          <a  class="btn btn-outline-success" href="{{ route('teachers.index') }}">Go Back</a>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
