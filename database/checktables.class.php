<?php

require "Dbh.class.php";

class CheckTables extends Dbh {

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "mvc";

    /* Automatically create tables if not exists in database.*/

    public function createTables() {

        if ($this->usersExists() == true) {

            $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->username, $this->password);
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      
            $sql = "CREATE table users (
                    id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR( 50 ) NOT NULL, 
                    email VARCHAR( 50 ) NOT NULL, 
                    password VARCHAR( 255 ) NOT NULL
            );";
               
               $dbh->exec($sql);
		}

        if ($this->postsExists() == true) {

            $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->username, $this->password);
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            $sql =  "CREATE table posts (
                id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                user_id INT(11) NOT NULL,
                title VARCHAR( 50 ) NOT NULL, 
                text TEXT NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
            );";
                    
            $dbh->exec($sql);
		}
    }

    /* Check if Tables of users and posts exists in database!*/

    public function usersExists() {
        
        $sql = "SHOW TABLES LIKE 'users'"; 
        $stmt = $this->connect()->query($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        $result;
        if ($stmt->rowCount() > 0) {
            $stmt = null;
            $result = false;
        }else {
            $result =  true;
        }

        return $result;

    }

    public function postsExists() {

        $sql = "SHOW TABLES LIKE 'posts'"; 
        $stmt = $this->connect()->query($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        $result;
        if ($stmt->rowCount() > 0) {
            $stmt = null;
            $result = false;
        }else {
            $result =  true;
        }

        return $result;

    }
}