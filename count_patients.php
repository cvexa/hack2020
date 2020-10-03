<?php 
	include 'php/functions-schedule.php';
	$sql = 'SELECT user_id, name, age FROM user_codes WHERE finished IS NULL';
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