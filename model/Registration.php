<?php

class Registration{

	public static function registrationUser(){
		$database = new Database();
		$errorString = array();
		$confirm = false;
		print_r($_POST);
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirm'];
			
			//get data
			$names = Registration::getNames();
			$emails = Registration::getEmails();

			//check errors
			if(!$email)
				array_push($errorString, "Неверный e-mail");
			if(in_array($email, $emails))		
				array_push($errorString,"Пользователь с такой почтой уже существует!");
			if(in_array($name, $name))		
				array_push($errorString,"Имя занято!");
			if($password != $confirmPassword)
				array_push($errorString,"Пароли не совпадают!");
			if(mb_strlen($password)<6)
				array_push($errorString,"Длина пароля должна быть не менее 6 символов!");


			if(count($errorString) == 0){
				$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$date = date("y-m-d");
				$query = "INSERT INTO user(name,email,password,status) VALUES({$name},{$email},{$password})";
				
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