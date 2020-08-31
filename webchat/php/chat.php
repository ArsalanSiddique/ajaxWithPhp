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

        function countMessages($user_id) {
            $table = "users_chat";
            $where = "sender_id = $user_id AND msg_status = 1";
            $result = $this->select($table, $where, null, null, null, null);
            $count = 0;
            if(mysqli_num_rows($result) > 0) {
                $count = mysqli_num_rows($result);
                return $count;
            }else {
                return $count;
            }
        }

        function msgReaded($sender_id, $receiver_id) {
            $table = "users_chat";
            $where = "sender_id = $sender_id AND receiver_id = $receiver_id AND msg_status = 1";
            $data = ["msg_status" => '0'];
            $result = $this->update($table, $data, $where);
            if(mysqli_num_rows($result) > 0) {
                return true;
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
