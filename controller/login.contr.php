<?php

class LoginContr extends Login {

    protected $username;
    protected $pwd;
    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($username, $pwd, $host, $user, $password, $database) {

        $this->username = $username;
        $this->pwd = $pwd;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }

    // This function call getUser() in model.
    public function loginUser() {

        if (!$this->emptyInputs()) {
            echo "<script type='text/javascript'>;
            alert('Empty inputs');
            window.location.href='../views/login.php';
            </script>";
			exit();
		}
        if (!$this->tableCheck()) {
            echo "<script type='text/javascript'>;
            alert('Table users don't exists!');
            window.location.href='../index.php';
            </script>";
            exit();
        }

		$this->getUser($this->username, $this->pwd);
    }

    // Check for empty inputs.
    private function emptyInputs() {

        $result;
        if (empty($this->username) || empty($this->pwd)) {
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


}