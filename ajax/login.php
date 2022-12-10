<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	header('Content-Type: application/json');
	require_once '../classes/User.php';
	
	if (isset($_POST) && !empty($_POST)) {
		$user = new \MDB\User($_POST['login'], $_POST['password']);
		$user->login();
	}
}