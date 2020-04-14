<?php

session_start();
$_SESSION["user_id"] = 1;
if(isset($_REQUEST["id"])) {
    $_SESSION["rec_id"] = $_REQUEST["id"];
}
// error_reporting();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

// // Report runtime errors
// error_reporting(E_ERROR | E_WARNING | E_PARSE);

// // Report all errors
// error_reporting(E_ALL);

// // Same as error_reporting(E_ALL);
// ini_set("error_reporting", E_ALL);

// // Report all errors except E_NOTICE

// error_reporting(E_ALL & ~E_NOTICE);
// // =============================================================

require_once("php/crud.php");
require_once("php/chat.php");

require_once("pages/head.php");
require_once("pages/body.php");
require_once("pages/footer.php");
