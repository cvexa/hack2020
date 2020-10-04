<?php
include './php/db_connect.php';

$sql = "SELECT * FROM user_codes WHERE code = '" . $_POST['code'] . "'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $res[] = $row["doctor_id"];
}


header('Location: single_doctor.php?doctor_id='.(int)$res[0]);
