<?php
include 'db_connect.php';
session_start();

//var_dump($_POST);
$dateTimeArr = $pieces = explode(" - ", $_POST['start_time']);
$startTime = date('H:i:s', strtotime($dateTimeArr[0]));
$namePatient = $_POST['name'];
$age = $_POST['age'];
$doctor_id = $_SESSION['doctor_id'];


$checkQuery = "SELECT * FROM schedule_hours JOIN schedule_place ON schedule_place.schedule_id = schedule_hours.schedule_place_id WHERE start_time = '" . $startTime . "' AND schedule_place.doctor_id = '" . $doctor_id . "'";
$checkPlaceResult = mysqli_query($conn, $checkQuery);
$error = mysqli_error($conn);


if (mysqli_num_rows($checkPlaceResult) < 1) {
    $checkTime = date('Y-m-d');
    $checkTime .= ' ' . $startTime;
    $checkQuery2 = "SELECT * FROM  schedule_place  WHERE ('" . date('Y-m-d H:i:s', strtotime($checkTime)) . "' BETWEEN start_date AND end_date) AND doctor_id = '" . $doctor_id . "'";
    $findPlaceId = mysqli_query($conn, $checkQuery2);
    var_dump(mysqli_num_rows($findPlaceId));
    if(mysqli_num_rows($findPlaceId) < 1){
        return header('Location: ../doctor_hourly_schedule.php?message="Въведения час не съвпада с вашите часови диапазони!"');
    }
    while ($row = mysqli_fetch_assoc($findPlaceId)) {
        $res[] = $row;
    }

    $schedulePlaceId = (int)$res[0]['schedule_id'];
    $insert_query = "INSERT INTO schedule_hours(start_time, schedule_place_id, name_patient, age) VALUES ('" . $startTime . "','" . $schedulePlaceId . "','" . $namePatient . "','" . $age . "')";
    $result = mysqli_query($conn, $insert_query);
    $errorFind = mysqli_error($conn);

    if ($result) {
        header('Location: ../doctor_hourly_schedule.php?message="Успешно обновихте графика си!"');
    }
}
