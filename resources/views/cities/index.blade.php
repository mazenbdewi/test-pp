<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>city index</title>
    </style>
</head>
<body> 
    <div class="container" style="margin-top:50px;" >
        @if ($message = Session::get('success'))
             <div class="alert alert-success" role="alert">
                  {{$message}}
             </div>
        @endif
        <div class="card">
      <div class="card-body" style="font-size: 35px"> 
      Here You Can See Cities!
       <br>
       <a class="btn" style="background: rgb(255, 72, 0)" href="{{ route('cities.create') }}">Add City <i class="fas fa-add"></i></a>
      </div>
     
<table class="table" id="cities-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Province</th>
                    <th>Country </th>
                    <th>Number Of Schools </th>
                    <th>Timezone </th>
                    <th >Actions</th>

                </tr>
            </thead>
            <tbody>
           @foreach ($cities as $index=>$item)
       <tr>
        <th scope="row">{{$index+1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->province}}</td>
        <td>{{$item->country}}</td>
        <td>{{$item->number_of_schools}}</td>
        <td >{{$item->timezone}}</td>
        <td >
          <div class="container">
            <div class="row">
             <div class="col-sm">
              <a href="{{ route('cities.edit' ,$item->id) }}"> <button type="submit" class="btn" style="background: gray"><i style="color: seashell" class="fas fa-1x fa-edit"></i></button></a>
             </div>
             <div class="col-sm">
              <a href="{{ route('cities.show' ,$item->id) }}"> <button type="submit" class="btn" style="background: rgb(120, 97, 184)"><i style="color: seashell" class="fas fa-1x fa-eye"></i></button></a>

             </div>
             <div class="col-sm">
              <form action="{{ route('cities.destroy' ,$item->id) }}" method="POST">
                @csrf
                @method('DELETE')
               <a > <button type="submit" class="btn" style="background: rgb(248, 16, 16)"><i style="color: seashell" class="fas fa-1x fa-trash-alt"></i></button></a>
              </form>
           </div>
           <div class="col-sm">
            <a href="{{ route('cities.schoolInCityShow' ,$item->id) }}"> <button type="submit" class="btn btn-success" style=" width:100%;">Schools</button></a>

           </div>
          </td>
       </tr>
       @endforeach
            </tbody>
        </table>
</div>


    </div>
    </div>
    <script src="dttps://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
   
 <script type="text/javascript">
        $(document).ready(function() {
            $('#cities-table').DataTable({
                processing: true,
                serverSide: false, 
                pageLength: 5,  
            });
        });
    </script>
</body>
</html>
