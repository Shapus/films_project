<?php
	class Database{
		private $connection;
		private $host;
		private $user;
		private $password;
		private $database_name;

		function __construct(){
			$this->host = 'localhost';
			$this->user = 'root';
			$this->password = '';
			$this->database_name = 'news_portal';
			$this->connect();
		}

		function __destruct(){
			$this->disconnect();
		}

		function connect(){
			if(!$this->connection){
				try{
					$database_string = 'mysql:host='.$this->host.';dbname='.$this->database_name.'';
					$this->connection = new PDO($database_string, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
				}
				catch(Exception $e){
					die('Connection failed: '.$e->getMessage());
				}
			}
			return $this->connection;
		}

		function disconnect(){
			if ($this->connection)
				$this->connection = null;
		}

		function getOne($query){
			$response = $this->connection->prepare($query);
			$response->execute();
			$response->setFetchMode(PDO::FETCH_ASSOC);
			return $response->fetch();
		}

		function getAll($query){
			$response = $this->connection->prepare($query);
			$response->execute();
			$response->setFetchMode(PDO::FETCH_ASSOC);
			return $response->fetchAll();
		}

		function executeRun($query){
			return $this->connection->exec($query);
		}
	}
?>