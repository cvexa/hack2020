<?php
	include 'db_connect.php';

	function setPatientsChecked($conn, $value){
		$sql = "UPDATE user_codes SET finished = 1 WHERE user_id = " . $value;
		$result = mysqli_query($conn, $sql);
		if (!$result){
			// Връщаме грешка
		}
	}

	function getPatientsWaiting($conn){
		$sql = "SELECT user_id, name, age FROM user_codes WHERE finished is null";
		$patients = array();
		$result = mysqli_query($conn, $sql);
		if ($result){
			while ($row = mysqli_fetch_assoc($result)) {
				$patients[$row['user_id']] = array('id' => $row['user_id'], 'name' => $row['name'], 'age' => $row['age']);
			}		
			return $patients;
		} else {
			// Връщаме грешка
		}
	}

	function clearFields($conn, $value){
		$sql = "UPDATE schedule_hours SET name_patient = NULL, age = NULL, reason = NULL WHERE id_hour = " . $value;
		$result = mysqli_query($conn, $sql);
		if (!$result){
			// Връщаме грешка
		}
	}

	function addFields($conn, $value){
		$sql = "UPDATE schedule_hours SET name_patient = '" . $value['patientName'] . "', age = '" . $value['patientAge'] . "', reason = '" . $value['reason'] . "' WHERE id_hour = " . $value["id_hour"];
		$result = mysqli_query($conn, $sql);
		if (!$result){
			// Връщаме грешка
		}
	}

	function returnAppointments($conn){
		$sql = "SELECT id_hour as id, schedule_hours.start_time as hour, places.place_name as place, name_patient, age, reason FROM schedule_hours JOIN schedule_place ON schedule_hours.schedule_place_id = schedule_place.schedule_id JOIN places ON schedule_place.place_id = places.place_id WHERE schedule_place.doctor_id = '" . $_SESSION['doctor_id'] . "' AND '".date('Y-m-d')."' BETWEEN DATE(schedule_place.start_date) AND DATE(schedule_place.end_date) ORDER BY schedule_place.start_date ASC";

		
		$result = mysqli_query($conn, $sql);  
		if ($result){
			$arrayAppoitments = array();
			$ids = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$arrayAppoitments[$row['id']] = array('id' => $row['id'], 'hour' => $row['hour'], 'place' => $row['place'], 'name_patient' => $row['name_patient'], 'age' => $row['age'], 'reason' => $row['reason']);
				array_push($ids, $row['id']);
			}			
			return $arrayAppoitments;
		} else {
			// Трябва да се върне грешката
		}
	}

	function printTable($arrayAppoitments){
		foreach ($arrayAppoitments as $value) {
			echo '<tr>';
			echo '<form method="POST" action="php/appoitments-update.php">';
			echo '<input type="hidden" value="' . $value['id'] . '" name="id_hour">';
			echo '<td>';
			echo $value['hour'];
			echo '</td>';
			echo '<td>';
			echo $value['place'];
			echo '</td>';
			echo '<td>';
			if (strlen($value['name_patient']) > 0){
				echo $value['name_patient'];
				echo '</td>';
				echo '<td>';
				echo $value['age'];
				echo '</td>';
				echo '<td>';
				echo $value['reason'];
				echo '</td>';
			} else {
				echo '<input type="text" name="patientName">';
				echo '</td>';
				echo '<td>';
				echo '<input type="text" name="patientAge">';
				echo '</td>';
				echo '<td>';
				echo '<input type="text" name="reason">';
				echo '</td>';
			}			
			echo '<td>';
			if (strlen($value['name_patient']) > 0){
				echo '<input type="submit" name="clear" value="Изчисти">';
			} else {
				echo '<input type="submit" name="clear" disabled value="Изчисти">';
			}
			
			echo '</td>';
			echo '<td>';
			if (strlen($value['name_patient']) > 0){
				echo '<input type="submit" name="save" disabled value="Запази">';
			} else {
				echo '<input type="submit" name="save" value="Запази">';
			}			
			echo '</td>';
			echo '</form>';
			echo '</tr>';			
		}	
	}