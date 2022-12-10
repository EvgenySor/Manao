<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	header('Content-Type: application/json');
	require_once '../classes/User.php';
	session_start();
	if(\MDB\User::isAuthorized())
		\MDB\User::logout();
}
else {
	die();
}