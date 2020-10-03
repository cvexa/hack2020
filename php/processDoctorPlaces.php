<?php
include 'db_connect.php';
session_start();

$placeId = $_POST['places'];
$dateTimeArr = $pieces = explode(" - ", $_POST['dateTime']);
$doctor_id = $_SESSION['doctor_id'];
$startDate = date('Y-m-d H:i:s',strtotime($dateTimeArr[0]));
$endDate = date('Y-m-d H:i:s',strtotime($dateTimeArr[1]));

$checkQuery = "SELECT * FROM places WHERE place_id = '" . $placeId . "'";
$checkPlaceResult = mysqli_query($conn, $checkQuery);
$error = mysqli_error($conn);

if(mysqli_num_rows($checkPlaceResult) < 1){
    $insertPlaceQuery = "INSERT INTO places(place_name,doctor_id) VALUES ('".$placeId."','".(int)$doctor_id."')";
    $resultInertPlace = mysqli_query($conn, $insertPlaceQuery);
    $error = mysqli_error($conn);
    $placeId = mysqli_insert_id($conn);
}
$insert_query = "INSERT INTO schedule_place(start_date, end_date, doctor_id, place_id) VALUES ('" . $startDate . "','" . $endDate . "','" . $doctor_id . "','" . $placeId . "')";
$result = mysqli_query($conn, $insert_query);
if($result){
    header('Location: ../doctor_daily_schedule.php?message="Успешно обновихте графика си!"');
}
//var_dump($result);
