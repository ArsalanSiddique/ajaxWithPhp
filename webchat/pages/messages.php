<?php
session_start();
require_once("../php/crud.php");
require_once("../php/chat.php");
$messages = $chatObj->messages($_SESSION["rec_id"]);
if ($messages != false) {
    echo '<div class="row" style="margin:0px 20px 45px 20px">';
    foreach ($messages as $message) {

?>
        <?php $data = '
            <div class="col-sm-12" style="margin:0px;">';

        if ($message["sender_id"] == $_SESSION["user_id"] and $message["receiver_id"] == $_SESSION["rec_id"]) {

            $data .= '<img src="assets/images/1.jpg" class="rounded-circle float-left mr-1" width="50" /><div class="alert alert-success float-left">
                        ' . $message["msg_content"] . '
                    </div>';
        } else if ($message["sender_id"] == $_SESSION["rec_id"] and $message["receiver_id"] == $_SESSION["user_id"]) {

            $data .= '<img src="assets/images/2.jpg" class="rounded-circle float-right ml-1" width="50" /><div class="alert alert-info float-right">
                        ' . $message["msg_content"] . '
                    </div>';
        }

        $data .= '</div>';

        echo $data;
        $users = $chatObj->msgReaded($_SESSION["rec_id"], $_SESSION["user_id"]);
    }
    echo "</div>";
} else {
    echo "No record found.";
}
        ?>