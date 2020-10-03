<?php
	include 'db_connect.php';
	function update(){
		$sql = "UPDATE user_codes SET finished = 1 WHERE finished IS NULL LIMIT 1";
		$result = mysqli_query($conn, $sql);
		if (!$result){
			// Връщаме грешка
		}	
	}
	