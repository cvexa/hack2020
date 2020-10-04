<?php
include 'db_connect.php';
session_start();

var_dump($_POST);

$read_query = "SELECT * FROM `doctors` WHERE `doctor_id` = ". $_SESSION['doctor_id'];
$result = mysqli_query($conn, $read_query);

var_dump($_SESSION);
if( $result ){
    $row = mysqli_fetch_assoc($result);
}

if( isset($_POST['speciality'])){
    $spec = $_POST['speciality'];
    $update_query = "UPDATE `doctors` SET `speciality` = '".$spec."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Speciality updated successfully!';
    } else {
        die('Query failed!' . mysqli_error($conn));
    }
}

if( isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $update_query = "UPDATE `doctors` SET `phone` = '".$phone."' WHERE `doctor_id` = " .$_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Phone number updated successfully!';
    } else {
        die('Query failed! Phone not recorded' . mysqli_error($conn));
    }
}

if( isset($_POST['first_name'])){
    $name = $_POST['first_name'];
    $update_query = "UPDATE `doctors` SET `first_name` = '".$name."' WHERE `doctor_id` = " .$_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Phone number updated successfully!';
    } else {
        die('Query failed! Phone not recorded' . mysqli_error($conn));
    }
}

if( isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $update_query = "UPDATE `doctors` SET `phone` = '".$phone."' WHERE `doctor_id` = " .$_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Phone number updated successfully!';
    } else {
        die('Query failed! Phone not recorded' . mysqli_error($conn));
    }
}

if( isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $update_query = "UPDATE `doctors` SET `phone` = '".$phone."' WHERE `doctor_id` = " .$_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Phone number updated successfully!';
    } else {
        die('Query failed! Phone not recorded' . mysqli_error($conn));
    }
}


if( isset($_POST['biography'])){
    $biography = $_POST['biography'];
    $update_query = "UPDATE `doctors` SET `biography` = '".$biography."' WHERE `doctor_id` = " . $_SESSION['doctor_id'];
    $result = mysqli_query($conn, $update_query);
    if($result){
        echo 'Biography updated successfully!';
    } else {
        die('Query failed! Biography not recorded!' . mysqli_error($conn));
    }
}

//var_dump($_FILES["photo"]);
if( isset($_FILES['photo']['name'])){

    var_dump($_FILES);

    $target_dir = "../doc_photos/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $filename = basename($_FILES['photo']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    $update_query = "UPDATE `doctors` SET `photo`='".$target_file."' WHERE `doctor_id`=". $_SESSION['doctor_id'] ;
    $result = mysqli_query($conn, $update_query);
    if($result){

        $_SESSION['success'] = "Record updated successfuly";

    } else {
        die('Query failed!' . mysqli_error($conn));
    }
}

header("location: ../doctor_step_1.php");
