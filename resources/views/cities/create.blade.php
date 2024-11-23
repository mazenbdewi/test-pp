<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Create</title>
</head>
<body> 
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
    <div class="container">

        <p style="padding: 10px ; color:gray" >Fill the form:</p>
        <form action="{{ route('cities.store') }}" method="POST">
            @csrf
            @method("")
            <div class="form-group">
              <label >Name</label>
              <input type="text" class="form-control" name="name" placeholder=". . . . . .">
            </div>
            <div class="form-group">
              <label>Province</label>
              <input type="text" class="form-control" name="province" placeholder=". . . . . .">
            </div>
            <div class="form-group">
                <label for=>Country</label>
                <input type="text" class="form-control" name="country" placeholder=". . . . . .">
              </div>
              <div class="form-group">
                <label for=>Number Of Schools In This City</label>
                <input type="text" class="form-control" name="number_of_schools" placeholder=". . . . . .">
              </div>
              <div class="form-group">
                <label for=>Timezone</label>
                <input type="text" class="form-control" name="timezone" placeholder=". . . . . .">
              </div>
            <div class="form-group">
                <button  style ="margin-left:50%" type="submit" class="btn btn-info">Save</button>
            </div>
          </form>
          <a  class="btn btn-outline-success" href="{{ route('cities.index') }}">Go Back</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
