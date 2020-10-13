<?php

class Registration{

	public static function registrationUser(){
		$errorString = array("","","","");
		$confirm = false;
		$noErrors = true;
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirm'];
			
			//get data
			$names = Registration::getNames();
			$emails = Registration::getEmails();

			//check errors
			if(in_array($name, $names))		
				$errorString[0] = "Имя занято";
			if(!$email)
				$errorString[1] = "Неверный e-mail";
			if(in_array($email, $emails))		
				$errorString[1] = "Пользователь с такой почтой уже существует";
			if(mb_strlen($password)<6)
				$errorString[2] = "Длина пароля должна быть не менее 6 символов";
			if($password != $confirmPassword)
				$errorString[3] = "Пароли не совпадают";
			
			foreach ($errorString as $error) {
				if($error != ""){
					$noErrors = false;
					break;
				}
			}

			if($noErrors){
				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				//$date = date("y-m-d");
				$database = new Database();
				$query = "INSERT INTO user(name,email,password) VALUES('{$name}','{$email}','{$passwordHash}')";				
				$item = $database->executeRun($query);
				if($item)
					$confirm = true;
			}		
		}
	return array($confirm, $errorString);
	}	

	public static function getNames(){
        $query = "SELECT name FROM user";
        $database = new Database();
        return $database->getAll($query);
	}
	public static function getEmails(){
        $query = "SELECT email FROM user";
        $database = new Database();
        return $database->getAll($query);
	}
}

?>