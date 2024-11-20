<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.21/css/dataTables.bootstrap4.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
</head>
<body> 
    <div class ="container">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: gray">Add New Teacher</h5>
              
              <a class="btn btn-primary" href="{{ route('teachers.create') }}">Add</a>
            </div>
        </div>

        <h4 style="margin: 15px">Teachers</h4>
        <table id="teachersTable" class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Courses</th>  
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                     $i=0;
                @endphp
                @foreach ($teachers as $item)   
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->age}}</td>
                    <td>
                      
                        <select class="form-control">
                            @foreach($item->courses as $course)    
                                <option>{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                              <div class="col-sm">
                                <a class="btn btn-warning" href="{{ route('teachers.edit', $item->id) }}" >Edit</a>
                              </div>
                              <div class="col-sm">
                                <a class="btn btn-warning" href="{{ route('teachers.show', $item->id) }}">Show</a>
                              </div>
                              <div class="col-sm">
                                <form action="{{ route('teachers.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                              </div>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
    <script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/datatables.net@1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.21/js/dataTables.bootstrap4.min.js"></script>

   
    <script>
        $(document).ready(function() {
            $('#teachersTable').DataTable();
        });
    </script>
</body>
</html>
