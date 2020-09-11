<?php

class Registration{

	public static function registrationUser(){
		$control = array(0=>false,1=>'error');
		if(isset($_POST['save'])){
			$errorString = "";
			$name = $_POST['name'];
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

			if(!$email)
				$errorString .= "Неверный e-mail!<br>";

			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			if($password != $confirm)
				$errorString .= "Пароли не совпадают!<br>";
			if(mb_strlen($password)<6)
				$errorString .= "Длина пароля должна быть не менее 6 символов!<br>";
			if(!mb_strlen($errorString)){
				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$date = date("y-m-d");
				$query = "INSERT INTO users(name,email,password,status,registration_date) VALUES('".$name."','".$email."','".$passwordHash."','user','".$date."')";
				$database = new Database();
				$item = $database->executeRun($query);
				if($item)
					$control[0] = true;	
			}		
			else
				$control[1] = $errorString;
		}
	return $control;
	}	
}

?>