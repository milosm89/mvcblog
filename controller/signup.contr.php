<?php

class SignUpContr extends Signup  {

    protected $username;
    protected $email;
    protected $pwd;
    protected $pwdRepeat;
    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($username, $email, $pwd, $pwdRepeat, $host, $user, $password, $database) {

        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }

   // This function call setUser() in model.
    public function signUpUser() {

        if ($this->emptyInputs() == false) {
			echo "<script type='text/javascript'>;
			alert('Empty inputs!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

		if ($this->invalidUid() == false) {
			echo "<script type='text/javascript'>;
			alert('Invalid username input!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

		if ($this->invalidEmail() == false) {
			echo "<script type='text/javascript'>;
			alert('Invalid email!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

		if ($this->pwdMatch() == false) {
			echo "<script type='text/javascript'>;
			alert('Password not match!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

		if ($this->tableCheck() == false) {
			echo "<script type='text/javascript'>;
			alert('Table usesrs not exists!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

		if ($this->uidTakenCheck() == false) {
			echo "<script type='text/javascript'>;
			alert('User name alreday exists!');
			window.location.href='../views/login.php';
			</script>";
			exit();
		}

        $this->setUser($this->username, $this->email, $this->pwd);
    }

	// Check for empty inputs.
    private function emptyInputs() {

        $result;
        if (empty($this->username) || empty($this->email) || empty($this->pwd) || empty($this->pwdRepeat)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

	// Check for inavalid username input.
    private function invalidUid() {

        $result;
		if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
			$result = false;
		}else {
			$result = true;
		}

		return $result;
    }

	// Check for invalid email input.
    private function invalidEmail() {

		$result;
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$result = false;
		}else {
			$result = true;
		}

		return $result;
	}

	// Check if password and repeat password is match.
    private function pwdMatch() {
	
		if ($this->pwd !== $this->pwdRepeat) {
			$result = false;
		}else {
			$result = true;
		}

		return $result;
	}

	// This function call usersTableExists() in model.
	private function tableCheck() {
		
		$result;
		if (!$this->usersTableExists()) {
			$result = false;
		}else {
			$result = true;
		}

		return $result;
	}

	// This function call checkUser() in model.
    private function uidTakenCheck() {
		
		$result;
		if (!$this->checkUser($this->username, $this->email)) {
			$result = false;
		}else {
			$result = true;
		}

		return $result;
	}

}