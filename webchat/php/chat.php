<?php

    class chat extends crud {
        function users() {
            session_start();
            $table = "users";
            $user_id = $_SESSION['user_id'];
            $where = "user_id <> '$user_id'";
            $result = $this->select($table, $where, null, null, null, null);
            if(mysqli_num_rows($result) > 0) {
                return $result;
            }else {
                return false;
            }
        }

        function messages($receiver_id) {
            session_start();
            $table = "users_chat";
            $sender_id = $_SESSION['user_id'];
            $where = "sender_id = '$sender_id' OR receiver_id = '$sender_id' OR receiver_id = '$receiver_id' OR sender_id = '$receiver_id'";
            $result = $this->select($table, $where, null, null, null, null);
            if(mysqli_num_rows($result) > 0) {
                return $result;
            }else {
                return false;
            }
        }

        function send($data) {
            $table = "users_chat";
            $result = $this->insert($table, $data, null);
            if($result == true) {
                return true;
            }else {
                return false;
            }
        }

    }

    $chatObj = new chat();


?>