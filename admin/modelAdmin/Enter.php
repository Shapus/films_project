<?php

class Enter{
    public static function login($email, $password){
        $_SESSION['user'] = null;
		$getPass = Enter::getPasswordHash($email);
		if($getPass){
			$passwordHash = $getPass['password'];
			if(password_verify($password, $passwordHash)){
                $_SESSION['user'] = Enter::getUser($email);
			}
		}
    }
    public static function getPasswordHash($email){
        $query = "SELECT password FROM user WHERE email='{$email}'";
        $database = new Database();
        return $database->getOne($query);
    }
    public static function getUser($email){
        $query = "SELECT * FROM user WHERE email='{$email}' and status=2";
        $database = new Database();
        return $database->getOne($query);
    }
}

?>