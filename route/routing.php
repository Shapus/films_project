<?php
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/',$host)[$num];

	if($path == '' or $path == 'index' or $path == 'index.php')
		$response = Controller::startSite();

	elseif($path == 'all')
		$response = Controller::getAllNews();

	elseif($path == 'category' and isset($_GET['id']))
		$response = Controller::getNewsByCategoryId($_GET['id']);

	elseif($path == 'news' and isset($_GET['id']))
		$response = Controller::GetNewsById($_GET['id']);

	elseif($path == 'insertcomment' and isset($_GET['comment'],$_GET['id']))
		$response = Controller::insertComment($_GET['id'],$_GET['comment']);

	elseif ($path == 'registrationForm')
		$response = Controller::registrationForm();

	elseif($path == 'registrationAnswer')
		$response = Controller::registrationAnswer();
	else
		$response = Controller::error404();
?>