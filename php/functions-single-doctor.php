<?php 
	include 'db_connect.php';

	function getPatientsWaiting($conn, $id){
		$sql = "SELECT user_id, name, age, code FROM user_codes WHERE finished is null AND doctor_id = " . $id;
		$patients = array();
		$result = mysqli_query($conn, $sql);
		if ($result){
			while ($row = mysqli_fetch_assoc($result)) {
				$patients[$row['user_id']] = array('id' => $row['user_id'], 'name' => $row['name'], 'age' => $row['age'], 'code' => $row['code']);
			}		
			return $patients;
		} else {
			// Връщаме грешка
		}
	}

	function getDoctorData($conn, $id){
		$sql = "SELECT doctor_id, first_name, last_name, speciality, phone, photo FROM `doctors` WHERE doctor_id = " . $id;
		$doctorData = array();
		$result = mysqli_query($conn, $sql);
		if ($result){
			while ($row = mysqli_fetch_assoc($result)) {
				$doctorData[$row['doctor_id']] = array('id' => $row['doctor_id'], 'first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'speciality' => $row['speciality'], 'phone' => $row['phone'], 'photo' => $row['photo']);
			}		
			return $doctorData;
		} else {
			// Връщаме грешка
		}
	}