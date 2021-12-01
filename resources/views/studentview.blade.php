<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <form  class="col-md-6" action="{{route('student.veiw')}}" method="POST" enctype="multipart/form-data">
        @csrf
        Age: <input type="number" size="6" name="age" min="18" max="99" value="21"><br>
Satisfaction: <input type="range" size="2" name="satisfaction" min="1" max="5" value="3">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Student Email</th>
            <th scope="col">Student Image</th>
            <th scope="col">Operations</th>
          
          </tr>
        </thead>
        <tbody>
    @foreach($student as $key )
          <tr>
            <td >{{ $key->name}}</td>
            <td>{{ $key->email}}</td>
            <td>
              <img src="{{asset($key->image)}}" height="30px" width="30px">
            </td>
            <td>
              
									<a href="{{ route('student.edit', $key->id)  }}"   >  <i class="fa fa-edit btn btn-success">Edit</i> </a>

            </td>
            <td>
              
              <a href="{{ route('student.delete', $key->id)  }}"   >  <i class="fa fa-edit btn btn-danger">Delete</i> </a>

        </td>
        
          </tr>
          @endforeach

      
        </tbody>
      </table>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>