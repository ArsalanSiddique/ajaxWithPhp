<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .my_section {
            padding: 24px;
            background-color: whitesmoke;
            box-shadow: 0px 0px 4px grey;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-primary text-center"> <u>Ajax Crud Operation</u></h2>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">
            Add User
        </button>
        <h2 class=""> <u> User List </u></h2>

        <div class="my_section m-auto">

            <div id="fetch_user"></div>
        </div>


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Registeration Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">First Name:</label>
                            <input type="text" name="" id="firstname" placeholder="Your First Name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Last Name:</label>
                            <input type="text" name="" id="lastname" placeholder="Your Last Name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="" id="email" placeholder="Your Email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Phone:</label>
                            <input type="number" name="" id="phone" placeholder="Your Phone Number" class="form-control" />
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="save_record()" data-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal" id="update_myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Update User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="update_firstname">First Name:</label>
                            <input type="text" name="" id="update_firstname" placeholder="Your First Name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="update_lastname">Last Name:</label>
                            <input type="text" name="" id="update_lastname" placeholder="Your Last Name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="update_email">Email:</label>
                            <input type="email" name="" id="update_email" placeholder="Your Email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="update_phone">Phone:</label>
                            <input type="number" name="" id="update_phone" placeholder="Your Phone Number" class="form-control" />
                        </div>
                        <input type="hidden" id="user_id" value="" />
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="update_record()" data-dismiss="modal">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
        $('document').ready(function() {
            show_record();
        });

        function show_record() {
            $.ajax({

                url: "fetch.php",
                type: "POST",

                success: function(data, status) {
                    $('#fetch_user').html(data);
                }

            });
        };


        function save_record() {
            var f_name = $("#firstname").val();
            var l_name = $("#lastname").val();
            var email = $("#email").val();
            var phone = $("#phone").val();

            $.ajax({

                url: "insert.php",
                type: "POST",
                data: {
                    f_name: f_name,
                    l_name: l_name,
                    email: email,
                    phone: phone
                },

                success: function(data, status) {
                    show_record();
                }

            });
        }


        function deleteUser(id) {
            var conf = confirm("Are You Sure?");
            if (conf == true) {
                $.ajax({

                    url: "process.php",
                    type: "POST",
                    data: {
                        delete_id: id
                    },
                    success: function(data, status) {
                        show_record();
                    }

                });
            }
        };

        function getUserDetails(id) {
            $('#user_id').val(id);
            $.post("process.php", {
                id: id
            }, function(data, status) {
                var user = JSON.parse(data);
                $('#update_firstname').val(user.first_name);
                $('#update_lastname').val(user.last_name);
                $('#update_email').val(user.email);
                $('#update_phone').val(user.phone);

            });

            $('#update_myModal').modal("show");
        }

        function update_record() {
            var f_name = $('#update_firstname').val();
            var l_name = $('#update_lastname').val();
            var email = $('#update_email').val();
            var phone = $('#update_phone').val();
            var id = $('#user_id').val();
            $.post(
                "process.php", {
                    f_name: f_name,
                    l_name: l_name,
                    email: email,
                    phone: phone,
                    user_id: id
                },
                function(data, status) {
                    alert(status);
                    $('update_myModal').modal('hide');
                    show_record();
                }
            )
        }
    </script>

</body>

</html>