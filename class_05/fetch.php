<?php

require_once("config.php");
$query = "select * from record where deleted_at IS NULL";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {

    $data = '<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Register At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>';
    $count = 1;
    foreach ($result as $rows) {
        $data .= '<tr>
        <td>' . $count++ . '</td>
        <td>' . $rows["first_name"] . ' ' . $rows["last_name"] . '</td>
        <td>' . $rows["email"] . '</td>
        <td>' . $rows["phone"] . '</td>
        <td>' . $rows["created_at"] . '</td>
        <td>' . $rows["updated_at"] . '</td>
        <td><button class="btn btn-link" onclick="getUserDetails('.$rows["id"].')">Edit</button><button class="btn btn-link text-danger" onclick="deleteUser('.$rows["id"].')">Delete</button></td>
    </tr>';
    };
    $data .= '</tbody>
</table>';

    echo $data;
} else {
    echo "No Record Found";
}
