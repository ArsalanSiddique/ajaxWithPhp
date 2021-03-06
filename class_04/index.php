<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax - Php - MySqli</title>
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
    <div class="container" style="padding:54px;">
        <div class="row">
            <div class="col-md-7 my_section m-auto">
                <h2>Register via Ajax</h2>
                <hr>
                <br>

                <form action="crud.php" method="POST" id="register">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>

        <button id="display_users" class="btn btn-primary">Display users</button>

        <div class="row mt-5">
            <div class="col-md-9 my_section m-auto">
                <h2>Users List</h2>
                <hr>
                <br>

                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="users_table"></tbody>
                </table>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var form = $('#register');
            $('#submit').click(function() {
                $.ajax({
                    url: form.attr("action"),
                    type: "POST",
                    data = $('#register input').serialize(),
                    success: function(data) {
                        console.log(data);
                    }
                });
            });

            fetch_users();

            function fetch_users() {
                $.ajax({

                    url: "fetch_users.php",
                    type: "POST",

                    success: function(users_record) {

                        $('#users_table').html(users_record);

                    }


                });
            }

        });
    </script>

</body>

</html>