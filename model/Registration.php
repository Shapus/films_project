<?php

class Registration{

	public static function registrationUser(){
		$control = array(0=>false,1=>"");
		if(isset($_POST['save'])){
			$errorString[];
			$name = $_POST['name'];
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

			if(!$email)
				$errorString[] = "Неверный e-mail!";

			$password = $_POST['password'];
			$confirm = $_POST['confirm'];
			if($password != $confirm)
				$errorString[] = "Пароли не совпадают!<br>";
			if(mb_strlen($password)<6)
				$errorString[] = "Длина пароля должна быть не менее 6 символов!<br>";
			if(count($errorString)==0){
				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$date = date("y-m-d");
				$query = "INSERT INTO user(name,email,password,status) VALUES({$name},{$email},{$password})";
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