<?php

    require_once('config.php');

    extract($_POST);
    if(isset($_POST["submit"])) {
        $query = "Insert into users values(null, '$email', '$password', null, null, null)";
        $result = mysqli_query($con, $query);
        if($result == true) {
            header("Location: index.php?msg=true");
        }else {
            header("Location: index.php?msg=false");
        }
    }




?>