<?php

    include("include/connection.php");
    if($_POST["sign_in"]) {

        $emial = htmlentities(mysqli_real_escape_string($con, $email));
        $pass = htmlentities(mysqli_real_escape_string($con, $password));

        $select_user = "select * from users where user_email = '$email' AND user_pass = '$pass'";

        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);

        

    }

?>