<?php

class Login extends Dbh {

    // Check if table users exists in database.
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


    // Login user.
    protected function getUser($username, $pwd) {

        $sql = "SELECT password FROM users WHERE username = ? OR email = ?";
        $stmt = $this->connect()->prepare($sql);
        
        if (!$stmt->execute(array($username, $pwd))) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            echo "<script type='text/javascript'>;
				alert('User not found!');
				window.location.href='../views/login.php';
				</script>";
			exit();
        }

        $pwdHashed = $stmt->fetchAll();
        $checkPwd = password_verify($pwd, $pwdHashed[0]['password']);

        if ($checkPwd == false) {
			$stmt = null;
            echo "<script type='text/javascript'>;
				alert('Wrong password!');
				window.location.href='../views/login.php';
				</script>";
			exit();
		}
        elseif ($checkPwd == true) {
			$sql = "SELECT * FROM users WHERE username = ? OR email = ? AND password =?";
			$stmt = $this->connect()->prepare($sql);
		}

        if (!$stmt->execute(array($username, $username, $pwd))) {
			$stmt = null;
			exit();
		}

		if ($stmt->rowCount() == 0) {
			$stmt = null;
            echo "<script type='text/javascript'>;
				alert('User not found!');
				window.location.href='../views/login.php';
				</script>";
			exit();
		}

		$user = $stmt->fetchAll();
		session_start();
		$_SESSION['name'] = $user[0]['username'];
		$_SESSION['userid'] = $user[0]['id'];

		$stmt = null;

    }
}