<?php
	namespace MDB;

	class User
	{
	    private $login;
	    private $password;
	    private $email;
	    private $name;

	    private const DB = '../db.json';

	    public function __construct($login = null, $password = null, $email = null, $name = null)
    	{
	        $this->login = htmlspecialchars($login);
	        $this->password = htmlspecialchars($password);
	        $this->email = htmlspecialchars($email);
	        $this->name = htmlspecialchars($name);
    	}

    	private function hashPassword($password)
    	{
    		return password_hash($password, PASSWORD_DEFAULT);
    	}

    	public function create()
    	{
    		session_start();
    		
    		$file = file_get_contents(self::DB);
			$users = json_decode($file, true);   
			unset($file);

			foreach ($users as $user) {
				if ($user['login'] == $this->login) {
					$errors['login_error'] = '<small class="form-text">The user with this login is already re-registered</small>';
				}
				if ($user['email'] == $this->email) {
					$errors['email_error'] = '<small class="form-text">User with this email has already been registered</small>';
				}
			}

			if (isset($errors) && !empty($errors)){
				echo json_encode($errors);
				die();
			}

			$new_user = [
				'login' => $this->login,
				'name' => $this->name,
				'password' => self::hashPassword($this->password),
				'email' => $this->email
			];

			$_SESSION['user'] = $this->login;

			$users[] = $new_user;
			file_put_contents(self::DB, json_encode($users, JSON_UNESCAPED_UNICODE));
			echo json_encode($new_user);
			die();	
    	}

    	public function login()
    	{
    		session_start();

    		$file = file_get_contents(self::DB);
			$users = json_decode($file, true);   
			unset($file);

			$login_exist = false;
			$password_exist = false;

			foreach ($users as $user) {
				if ($this->login == $user['login']){
					$login_exist = true;
				}
				if (password_verify($this->password, $user['password'])){
					$password_exist = true;
				}
			}

			if (!$login_exist) {
				$errors['login_error'] = '<small class="form-text">User with this login does not exist</small>';
			} 
			if (!$password_exist) {
				$errors['password_error'] = '<small class="form-text">Invalid password</small>';
			}

			if (isset($errors) && !empty($errors)){
				echo json_encode($errors);
				die();
			}

			$_SESSION['user'] = $this->login;
			echo json_encode(['login' => $this->login]);
    	}

    	public static function isAuthorized()
    	{
	        if (!empty($_SESSION["user"])) {
	            return true;
	        }
	        return false;
    	}

    	public static function logout()
    	{
	        if (!empty($_SESSION["user"])) {
	            unset($_SESSION["user"]);
	        }
    	}
	}