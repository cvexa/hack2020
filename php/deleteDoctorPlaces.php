<?php
include 'db_connect.php';
session_start();

$schedule_placeId = (int)$_POST['schedule_place'];

$deleteQuery = "DELETE FROM schedule_place WHERE schedule_id = '" . $schedule_placeId . "'";
$deleteQueryExecute = mysqli_query($conn, $deleteQuery);

if ($deleteQueryExecute) {
    header('Location: ../doctor_daily_schedule.php?message="Успешно обновихте графика си!"');
}
