<?php
	session_start();
	require_once 'classes/User.php';
	if (\MDB\User::isAuthorized()){
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<noscript>
		<div class="error">
		  Please enable JavaScript!
		</div>
	</noscript>
	<div class="container">
		<form method="post" id="loginForm">
			<div class="form-group">
				<label for="inputLogin">Login</label>
				<input type="text" class="form-control" id="inputLogin" required name="login">
				<!-- <small class="form-text text-muted">Мы никогда никому не передадим Вашу электронную почту.</small> -->
			</div>
			<div class="form-group">
				<label for="inputPassword">Password</label>
				<input type="password" class="form-control" id="inputPassword" required name="password">
			</div>
			<button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
		</form>
		<div><a href="register_form.php">Don't have an account? Register here</a></div>
	</div>
		
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="./assets/js/login_form.js"></script>
</body>
</html>