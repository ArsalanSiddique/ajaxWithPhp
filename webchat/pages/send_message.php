<?php
require_once("../php/crud.php");
require_once("../php/chat.php");

session_start();
if (isset($_POST["message"]) && $_POST["receiver"] != "") {
    extract($_POST);
    $data = [null, $_SESSION["user_id"], $receiver, $message, 1, null];
    $result = $chatObj->send($data);
    if ($result == false) {
        echo '<script> alert("something went wrong, try again") </script>';
    }else {
        // do nothing
    }
}
