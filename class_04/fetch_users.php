<?php

require_once("config.php");
$query = "select * from users";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $count = 1;
    foreach ($result as $rows) {
        ++$count;
?>

<tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $rows["email"]; ?></td>
    <td><?php echo $rows["created_at"]; ?></td>
</tr>

<?php
    }
}
?>