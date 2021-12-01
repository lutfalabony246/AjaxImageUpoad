<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hello, world!</title>
  </head>
  <body>
  <div id="app">

        <div  class="py-4">
        <!-- Modal -->
<div class="modal fade" id="AddEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add EMployee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="AddEmployeeFORM" method="POST" enctype='multipart/form-data'>
      
      <div class="modal-body">
      <ul class="alert alert-warning d-none" id="save_errorList"></ul>
     <div class="form-group mb-3">
                    <label for=""> Name</label>
                    <input type="text" name="name"  class=" form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">phone</label>
                    <input type="text" name="phone" class="course form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                    <input type="file"  name="image" class="email form-control">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
        <h4>Laravel Image Crud</h4>
        <a href="#" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#AddEmployeeModal">ADD EMPLOYEE</a>
        </div>
        <div class="card-body">
                <div class="table-responsive">

        </div>
</div>
        </div>
        </div>
        </div>
        </main>
        </div>
     <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    {{-- ajax --}}
    <script>
   $(document).ready(function () {
       $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       $(document).on('submit', '#AddEmployeeFORM', function (e) {
            e.preventDefault();
            let formData=new FormData($('#AddEmployeeFORM')[0]);
         
        $.ajax({
          type:"POST",
          url: "/employee",
           data: formData,
           contentType: false,
           processData: false,
           success: function(response) {
             if (response.status ==400) 
             {
                $('#save_errorList').html("");
                $('#save_errorList').removeClass('d-none');
                 $.each(response.errors,function(key,err_value){
                   $('#save_errorList').append('<li>'+err_value+'</li>')
                 });
            //    this.reset();
            //    alert('Image has been uploaded successfully');
             }
             else if(response.status ==200)
             {
                 $('#save_errorList').html("");
                $('#save_errorList').removeClass('d-none');
                //  this.reset();
                $('#AddEmployeeFORM').find('input').val('');
                 $('#AddEmployeeModal').modal('hide');
                  alert(response.message);
             }
           }
        //    error: function(response){
        //       console.log(response);
        //         $('#image-input-error').text(response.responseJSON.errors.file);
        //    }
            });
       });
   });

    </script>
     </body>
</html>