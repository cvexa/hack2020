<?php
include 'db_connect.php';
session_start();

function getDoctorPlaces($conn)
{
    $sql = "SELECT * FROM places WHERE doctor_id = '" . $_SESSION['doctor_id'] . "'";
    $result = mysqli_query($conn, $sql);
    //$row = $result->fetch_assoc();
    while ($row = mysqli_fetch_assoc($result)) {
        $res[$row["place_id"]]['place_name'] = $row["place_name"];
    }

    return isset($res)?$res:[];
}

function getDoctorScheduledPlaces($conn)
{
    $sql = "SELECT * FROM schedule_place JOIN places ON schedule_place.place_id = places.place_id WHERE schedule_place.doctor_id = '" . $_SESSION['doctor_id'] . "' ORDER BY schedule_place.start_date ASC";
    $result = mysqli_query($conn, $sql);
    //$row = $result->fetch_assoc();
    //$error = mysqli_error($conn);
//    var_dump($error);
//    die;
    while ($row = mysqli_fetch_assoc($result)) {
        $res[$row["schedule_id"]] = $row;
    }

    return isset($res)?$res:[];
}

function getDoctorDailyHours($conn)
{
    $sql = "SELECT * FROM schedule_hours JOIN schedule_place ON schedule_place.schedule_id = schedule_hours.schedule_place_id JOIN places ON places.place_id = schedule_place.place_id WHERE schedule_place.doctor_id = '" . $_SESSION['doctor_id'] . "' ORDER BY schedule_place.start_date ASC";
    //$sql = "SELECT * FROM schedule_place JOIN schedule_hours  ON schedule_place.schedule_id = schedule_hours.schedule_place_id JOIN places ON places.place_id = schedule_place.place_id WHERE schedule_place.doctor_id = '" . $_SESSION['doctor_id'] . "' ORDER BY schedule_place.start_date ASC";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    while ($row = mysqli_fetch_assoc($result)) {
        $res[$row["schedule_id"]] = $row;
    }

    return isset($res)?$res:[];
}

function getTodayPlaces($conn)
{
    $sql = "SELECT * FROM schedule_place JOIN places ON schedule_place.place_id = places.place_id WHERE schedule_place.doctor_id = '" . $_SESSION['doctor_id'] . "' AND '".date('Y-m-d')."' BETWEEN DATE(schedule_place.start_date) AND DATE(schedule_place.end_date) ORDER BY schedule_place.start_date ASC";
    $result = mysqli_query($conn, $sql);
    //$row = $result->fetch_assoc();
    //$error = mysqli_error($conn);
//    var_dump($error);
//    die;
    while ($row = mysqli_fetch_assoc($result)) {
        $res[$row["schedule_id"]] = $row;
    }

    return isset($res)?$res:[];
}
