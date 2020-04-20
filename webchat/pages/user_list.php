<?php

require_once("../php/crud.php");
require_once("../php/chat.php");

$users = $chatObj->users();
if ($users != false) {
    foreach ($users as $user) {

?>

        <li>
            <a href="index.php?id=<?php echo $user["user_id"] ?>">
                <img src="assets/images/1.jpg" class="img-thumbnail" style="border-radius:100px; width: 50px; height:50px;" alt="user">
                <?php echo $user["user_name"]; ?> <?php if ($user["log_in"] == 1) { ?><span class="text-success"><i class="fa fa-circle" style="font-size:11px;"></i></span> <?php } ?>
            </a>
        </li>

<?php }
} ?>