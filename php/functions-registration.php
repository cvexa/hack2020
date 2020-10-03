<?php 	
	include 'db_connect.php';
	// Да добавим ако имаме време за твърде кратки и твърде дълги пароли, да добавим за валиден мейл	

	function registration($register_data, $conn){
		$insert_query = "INSERT INTO doctors(first_name, last_name, email, password) VALUES ('" . $register_data[0] . "','" . $register_data[1] . "','" . $register_data[2] . "','" . password_hash($register_data[3], PASSWORD_BCRYPT) . "')";
		if (mysqli_query($conn, $insert_query)){
			return 'registration';
		} else {
			$error = mysqli_error($conn);
			if (strpos($error, 'Duplicate entry') !== false){
				return 'duplicate';
			} else {
				return 'error';
			}
		}   
	}
        
	function add_values_to_register_data(){		
		$register_data = array();
		if (isset($_POST['submit']) == true){
			$register_data[0] = trim(htmlentities($_POST['nameFirst']));
			$register_data[1] = trim(htmlentities($_POST['nameLast']));
			$register_data[2] = trim(htmlentities($_POST['email']));
			$register_data[3] = trim(htmlentities($_POST['password']));
			$register_data[4] = trim(htmlentities($_POST['passwordRepeat']));
			$register_data[5] = check_are_all_fields_set($register_data);
		}
		return $register_data;
	}

	function check_are_all_fields_set($register_data){
		$is_ok = true;
		for ($i=0; $i < 5 ; $i++) { 
			if (strlen($register_data[$i]) == 0){
				$is_ok = false;
			}
		}
		return $is_ok;
	}

?>