<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>schools in city show</title>
</head>
<body> 
    <div class="container" style="margin: 60px ; padding-left:200px;">  
                
        @if (isset($schools)&& $schools->count()>0)
        <div class="alert alert-primary" role="alert">
         Threr are {{$schools->count()}} schools in this City
        </div>
                <table class="table  table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Capicity</th>
                    <th scope="col">#Rooms</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                <tr>
                    <th  scope="row">{{$school->id}}</th>
                    <td >{{$school->name}}</td>
                    <td >{{$school->type}}</td>
                    <td >{{$school->capacity}}</td>
                    <td >{{$school->rooms_num}}</td>
                    <td>{{$school->address}}</td>
                </tr>
                @endforeach 
            </tbody>
        </table>  
        @endif          
        <div class="form-group" style="padding-top:50px;">
                <a style="margin-left:350px; " class="btn btn-outline-primary" href="{{ route('cities.index') }}" >Go Back</a>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
