<?php
include 'db_connect.php';
session_start();

$read_query = "SELECT * FROM `doctors` WHERE `doctor_id` = ". $_SESSION['doctor_id'];
$result = mysqli_query($conn, $read_query);

if( $result ){
    $row = mysqli_fetch_assoc($result);
}

//var_dump($row);

if( isset($_POST['first_name'])){
    $name = $_POST['first_name'];
    $update_query = "UPDATE `doctors` SET `first_name` = '".$name."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    $_SESSION['first_name'] = $_POST['first_name'];
}

if( isset($_POST['last_name'])){
    $family = $_POST['last_name'];
    $update_query = "UPDATE `doctors` SET `last_name` = '".$family."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    $_SESSION['last_name'] = $_POST['last_name'];
}

if( isset($_POST['speciality'])){
    $spec = $_POST['speciality'];
    $update_query = "UPDATE `doctors` SET `speciality` = '".$spec."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
}

if( isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $update_query = "UPDATE `doctors` SET `phone` = '".$phone."' WHERE `doctor_id` = " .$_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
}

if( isset($_POST['biography'])){
    $biography = $_POST['biography'];
    $update_query = "UPDATE `doctors` SET `biography` = '".$biography."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
}

var_dump($_FILES["photo"]);
if( isset($_FILES['photo']['name']) && (strlen($_FILES['photo']['name']) > 0) ){

    $target_dir = "../doc_photos/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $filename = basename($_FILES['photo']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {

    } else {

    }

    $update_query = "UPDATE `doctors` SET `photo`='".$target_file."' WHERE `doctor_id`=". $_SESSION['doctor_id'] ;
    $result = mysqli_query($conn, $update_query);
}

$_SESSION['success'] = "Record updated successfuly";
header('Location: ../doctor_step_1.php');
