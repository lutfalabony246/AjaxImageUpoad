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

        <main class="py-4">
           {{-- for add start --}}
           {{-- Add Modal --}}
<div class="modal fade" id="AddEmployeeModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddEmployeeModal">Add </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" required class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" required class="course form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" required class="phone form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">Save</button>
            </div>

        </div>
    </div>
</div>


{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="stud_id" />

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="name" required class="form-control">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" id="course" required class="form-control">
                </div> --}}
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" id="phone" required class="form-control">
                </div>
                
                <div class="form-group mb-3">
                   
                  {{-- <input type="radio"  id="course"  required value="female"> female
                  <input type="radio"  id="course"  required value="male"> male
               --}}
            <label>Sex</label><br>
            <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="course" id="inlineRadio1" value="male">
        <label class="form-check-label" for="inlineRadio1">Male</label>
</div>
<div class="form-check form-check-inline">
                                                        
<input class="form-check-input course" type="radio" name="course" id="inlineRadio2" value="female">
<label class="form-check-label course" for="inlineRadio2">Female</label>
                                                        </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>

{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddStudentModal">Add Student</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

           {{-- end add --}}
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
    
            fetchstudent();
    
            function fetchstudent() {
                $.ajax({
                    type: "GET",
                    url: "/fetch-students",
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.students, function (key, item) {
                            $('tbody').append('<tr>\
                                <td>' + item.id + '</td>\
                                <td>' + item.name + '</td>\
                                <td>' + item.course + '</td>\
                                <td>' + item.email + '</td>\
                                <td>' + item.phone + '</td>\
                                <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                                <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                            \</tr>');
                        });
                    }
                });
            }
    
            $(document).on('click', '.add_student', function (e) {
                e.preventDefault();
    
                $(this).text('Sending..');
    
                var data = {
                    'path': $('.path').val(),
                    'course': $('.course:checked').val(),
                    'email': $('.email').val(),
                    'phone': $('.phone').val(),
                    //  'course'= $('input[type="radio"]:checked').val();
                   
                }
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $.ajax({
                type: "POST",
                url: "/students",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddStudentModal').modal('hide');
                        fetchstudent();
                    }
                    }
                });
    
            });
    
            $(document).on('click', '.editbtn', function (e) {
                e.preventDefault();
                var stud_id = $(this).val();
                // alert(stud_id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-student/" + stud_id,
                    success: function (response) {
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').modal('hide');
                        } else {
                            // console.log(response.student.name);
                            $('#name').val(response.student.name);
                            // $('#course').val(response.student.course);
                            $('#email').val(response.student.email);
                            $('#phone').val(response.student.phone);
                            $('#stud_id').val(stud_id);
                             if (response.student.course == 'male') {
                            $('#editModal').find(':radio[name=course][value="male"]').prop(
                                'checked', true);
                        } else {
                            $('#editModal').find(':radio[name=course][value="female"]').prop(
                                'checked', true);
                        }
                        }
                    }
                });
                $('.btn-close').find('input').val('');
    
            });
    
            $(document).on('click', '.update_student', function (e) {
                e.preventDefault();
    
                $(this).text('Updating..');
                var id = $('#stud_id').val();
                // alert(id);
    
                var data = {
                //      if (response.student.course == 'male') {
                //             $('#editModal').find(':radio[name=course][value="male"]').prop(
                //                 'checked', true);
                //         } else {
                //             $('#editModal').find(':radio[name=course][value="female"]').prop(
                //                 'checked', true);
                //         }
                    'name': $('#name').val(),
                    'course': $('#course:checked').val(),
                    'email': $('#email').val(),
                    'phone': $('#phone').val(),
            //         $('.check_edit').each(function(){  
            //   if($(this).is(":checked"))  
            //   {  
            //     vehicle.push($(this).val());  
            //   }  
            // });  
                    // switch (response.student.course =='checked') {
                    //     case value:
                    //          'course': $('#course').val();
                    //         break;
                    
                    //     default:
                    //         break;
                    }
                    // if(response.student.course =='checked')
                    // {

                    // }
                    //  'course' = $('input[name=gender1]:checked').val(),
            //           if($(this).is(":checked"))  
            //   {  
            //     vehicle.push($(this).val());  
            //   }  
            // });  
            // vehicles = vehicle.toString();
            // var radio = $('input[name=gender1]:checked').val();
            //     }
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $.ajax({
                    type: "PUT",
                    url: "/update-student/" + id,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#update_msgList').html("");
                            $('#update_msgList').addClass('alert alert-danger');
                            $.each(response.errors, function (key, err_value) {
                                $('#update_msgList').append('<li>' + err_value +
                                    '</li>');
                            });
                            $('.update_student').text('Update');
                        } else {
                            $('#update_msgList').html("");
    
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#editModal').find('input').val('');
                            $('.update_student').text('Update');
                            $('#editModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });
    
            });
    
            $(document).on('click', '.deletebtn', function () {
                var stud_id = $(this).val();
                $('#DeleteModal').modal('show');
                $('#deleteing_id').val(stud_id);
            });
    
            $(document).on('click', '.delete_student', function (e) {
                e.preventDefault();
    
                $(this).text('Deleting..');
                var id = $('#deleteing_id').val();
    
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $.ajax({
                    type: "DELETE",
                    url: "/delete-student/" + id,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('.delete_student').text('Yes Delete');
                            $('#DeleteModal').modal('hide');
                            fetchstudent();
                        }
                    }
                });
            });
    
        });
    
    </script>
    {{-- ajax end --}}
  </body>
</html>