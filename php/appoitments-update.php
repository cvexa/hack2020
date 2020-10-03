<?php
	include 'functions-schedule.php';
	if (isset($_POST['clear'])){
        clearFields($conn, $_POST['id_hour']);
    }

    if (isset($_POST['save'])){
        addFields($conn, $_POST);
    }
        
	header("location: ../doctor_schedule.php");    
    exit;  