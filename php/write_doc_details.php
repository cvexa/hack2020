<?php 
//include './php/db_connect.php'; 

$_SESSION['doctor_id']=4;
include '../includes/admin/db_connect.php';

if( isset($_POST['speciality'])){
	$spec = $_POST['speciality'];
	$update_query = "UPDATE `doctors` SET `speciality` = '$spec' WHERE `doctor_id` = $_SESSION['doctor_id']";
	$result = mysqli_query($conn, $update_query);
	if($result){
		echo 'Record created successfully!';
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}

if( isset($_POST['phone'])){
	$phone = $_POST['phone'];
	$update_query = "UPDATE `doctors` SET `phone` = '$phone' WHERE `doctor_id` = $_SESSION['doctor_id']";
	$result = mysqli_query($conn, $update_query);
	if($result){
		echo 'Record created successfully!';
	} else {
		die('Query failed! Phone not recorded' . mysqli_error($conn));
	}
}


if( isset($_POST['biography'])){
	$biography = $_POST['biography'];
	$update_query = "UPDATE `doctors` SET `biography` = '$biography' WHERE `doctor_id` = $_SESSION['doctor_id']";
	$result = mysqli_query($conn, $update_query);
	if($result){
		echo 'Record created successfully!';
	} else {
		die('Query failed! Biography not recorded!' . mysqli_error($conn));
	}
}

//var_dump($_FILES["photo"]);
if( isset($_FILES['photo']['name'])){

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

	$update_query = "UPDATE `doctors` SET `photo`='$target_file' WHERE `doctor_id`=$_SESSION['doctor_id']";
	$result = mysqli_query($conn, $update_query);
	if($result){
		//redirect
		echo "Record updated successfuly";
	} else {
		die('Query failed!' . mysqli_error($conn));
	}
}
