<?php
session_start();
require_once 'classes/User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page 2</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<div class="header">
		<nav class="nav">
			<ul class="header_menu"> 
				<li class="header_menu__item"><a href="/">Main Page</a></li>
				<li class="header_menu__item "><a href="page1.php">Page 1</a></li>
				<li class="header_menu__item"><a href="page2.php">Page 2</a></li>
			</ul>
		</nav>
		<div class="user_menu">
			<?php if (\MDB\User::isAuthorized()): ?>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Hello, <?php echo $_SESSION['user'] ?>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" id="logoutButton" href="#">Log out</a>
				</div>
			</div>
			<?php else: ?>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Hello, Guest
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="register_form.php">Register</a>
						<a class="dropdown-item" href="login_form.php">Log in</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="assets/js/index.js"></script>
</body>
</html>