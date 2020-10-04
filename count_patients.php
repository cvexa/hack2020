<?php 
	include 'php/functions-schedule.php';
	$doctorId = Trim(stripslashes($_POST['doctorId']));
	
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
			echo json_encode($final);
		} else {
			echo 'Error 1';
		}