<?php
    
    if(isset($_POST["login"])) {

        require_once("../crud.php");
        
        extract($_POST);

        $table = "users";
        $where = " user_name = '$username' AND user_pass = '$password'";

        $result = $mainObj->select($table, $where, null, null, null, null);
        
        if(mysqli_num_rows($result) > 0) {
            session_start();
            $row = mysqli_fetch_array($result);
            $user_id = $_SESSION["user_id"] = $row["user_id"];

            $data = ["log_in" => "1"];
            $where = "user_id = '$user_id'";
            $result2 = $mainObj->update($table, $data, $where);

            header("Location: ../../index.php");
        }
        
    }else {
        echo "run";
    }

?>