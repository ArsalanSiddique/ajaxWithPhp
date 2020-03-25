<?php

    $state = $_GET["state"];

    $a = array("Karachi", "Hyderabad");
    $b = array("Islamabad", "Lahore");
    $c = array("Quetta", "Lasbela");

    if($state == "Sindh") {
        foreach($a as $city) {
            echo "<option value='$city'> $city </option>";
        }
    }else if($state == "Punjab") {
        foreach($b as $city) {
            echo "<option value='$city'> $city </option>";
        }
    }else if($state == "Baluchistan") {
        foreach($c as $city) {
            echo "<option value='$city'> $city </option>";
        }
    }


?>