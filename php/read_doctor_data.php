<?php
include './php/db_connect.php';

$read_query = "SELECT * FROM `doctors` WHERE `doctor_id` = ". $_SESSION['doctor_id'];
$result = mysqli_query($conn, $read_query);

if( $result ){
    $row = mysqli_fetch_assoc($result);
}
