<?php
	include 'php/functions-schedule.php';
	$patientName = Trim(stripslashes($_POST['patientName'])); 
	$patientAge = Trim(stripslashes($_POST['patientAge']));
	$doctorId = Trim(stripslashes($_POST['doctorId']));
	if (isset($_POST['patientReason'])){
		$reason = $_POST['patientReason'];
	} else {
		$reason = '';
	}

	$code = generateUnique();

	$sql = 'INSERT INTO user_codes(code, name, age, doctor_id) VALUES ("' . $code . '", "' . $patientName . '", ' . $patientAge . ',' . $doctorId . ')';
	$result = mysqli_query($conn, $sql);
	if ($result){
		$sql = 'SELECT user_id, name, age FROM user_codes WHERE finished IS NULL AND doctor_id = ' . $doctorId;
		$resultTwo = mysqli_query($conn, $sql);
		if ($resultTwo){
			$patients = array();
			while ($row = mysqli_fetch_assoc($resultTwo)) {
				$patients[$row['user_id']] = array('id' => $row['user_id'], 'name' => $row['name'], 'age' => $row['age']);
			}			
			$final = array();
			$final['arrCount'] = sizeof($patients);
			$final['patientsData'] = $patients;
			if (isset($reason) && strlen($reason) > 0){
				header("location: single_doctor.php?doctor_id=" . $doctorId . '&code=' . $code);
                exit;
			}
			echo json_encode($final);
		} else {
			echo 'Error 1';
		}
	} else {
		echo 'Error 2';
	}

	function generateUnique(){
		$bytes = random_bytes(5);
		return bin2hex($bytes);
	}