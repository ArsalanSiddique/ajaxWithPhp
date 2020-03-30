<?php

    if(isset($_POST["delete_id"])) {
        require_once('config.php');
        extract($_POST);

        $query = "update record set deleted_at = now() where id = '$delete_id'";
        $result = mysqli_query($con, $query);
        
    }

    if(isset($_POST["id"]) && $_POST["id"] != "") {
        require_once('config.php');
        extract($_POST);

        $query = "select * from record where id = '$id'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0) {
            // $row = mysqli_fetch_assoc($result);
            // $response = $row;

            while($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        }else {
            $response["status"] = 200;
            $response["message"] = "Data not found";
        }
        echo json_encode($response);
    }else {
        $response["status"] = 200;
        $response["message"] = "Invalid Request";
    }




if(isset($_POST["user_id"]) && $_POST["user_id"] != "") {
    require_once('config.php');
    extract($_POST);
    $query = "update record set `last_name` = '$l_name', `first_name` = '$f_name', `email` = '$email', `phone` = '$phone', updated_at = now() where id = '$user_id'";
    $result = mysqli_query($con, $query);
}
