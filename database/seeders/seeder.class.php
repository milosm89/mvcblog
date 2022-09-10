<?php

require_once("database/Dbh.class.php");

class DummyData extends Dbh {

    public $text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
    It has survived not only five centuries, but also the leap into electronic typesetting, 
    remaining essentially unchanged. 
    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
    and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

    public function fakeData() {

        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {

            $hashPwd = password_hash('123', PASSWORD_DEFAULT); 
            $sql = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array("admin", "admin@gmail.com", $hashPwd))) {
                $stmt = null;
                exit();
            }
    
            $stmt = null;

        }
        
        $sql = "SELECT * FROM posts";
        $stmt = $this->connect()->query($sql);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {

            $sql = "INSERT INTO posts(user_id, title, text) VALUES (?, ?, ?), (?, ?, ?), (?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute(array("1", "First post", $this->text, 
                "1", "Second post", $this->text, 
                "1", "Third post", $this->text
            ))) {
                $stmt = null;
                exit();
            }

            $stmt = null;

        }
    }
}