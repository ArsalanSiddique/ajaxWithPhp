<?php

    require_once("config.php");

    extract($_POST);
    $query = "Insert into record VALUES(null, '$f_name', '$l_name', '$email', '$phone', null, null, null)";
    $result = mysqli_query($con, $query);


?>