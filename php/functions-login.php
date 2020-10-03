<?php 
	include 'db_connect.php';
	session_start();

	function loginToSite($email, $password, $conn){
		$sql = "SELECT doctor_id, first_name, last_name, speciality, biography, email, password FROM doctors WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);  
        if ($result){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if (password_verify($password, $row['password'])){
                $_SESSION['doctor_id'] = $row['doctor_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['speciality'] = $row['speciality'];
                $_SESSION['biography'] = $row['biography'];
                $_SESSION['email'] = $row['email'];
                return 'Login';
            } else {
            	$_SESSION['email'] = $email;
                return 'Password mismatch';
            }
        } else {
        	$_SESSION['email'] = $email;
            return 'Problem';
        }  
	}
?>