<?php

class SignUp extends Dbh {

	// Check if users table exists indatabase.
	protected function usersTableExists() {

		$sql = "SHOW TABLES LIKE 'users'"; 
        $stmt = $this->connect()->query($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            return $results = false;
            exit();

        }else {
			return $results = true;
		}
	}

	// Create user.
    protected function setUser($username, $email, $pwd) {

        $sql = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);

        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $email,  $hashPwd))) {
			$stmt = null;
			exit();
		}

		$stmt = null;

      
    }

	// Check if user alreday exists.
    protected function checkUser($username, $email) {
		$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
		$stmt = $this->connect()->prepare($sql);

		if (!$stmt->execute(array($username, $email))) {
			$stmt = null;
			exit();
		}

		$resultCheck;
		if ($stmt->rowCount() > 0) {
			$resultCheck = false;
		}else {
			$resultCheck = true;
		}

		return $resultCheck;
	}
}