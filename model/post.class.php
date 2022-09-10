<?php

class Post extends Dbh {

    // Check if table posts exists in database. 
    protected function postsTableExists() {
        
        $sql = "SHOW TABLES LIKE 'posts'"; 
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

    // Create post. 
    protected function create($userId, $title, $text) {

        $sql = "INSERT INTO posts(user_id, title, text) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($userId,$title, $text))) {
            $stmt = null;
            exit();
        }

        $stmt = null;
    }

    // List all posts. 
    protected function show() {

        $sql = "SELECT * FROM posts ORDER BY created_at ASC";
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
            $results = $stmt->fetchAll();
            return $results;
            $stmt = null;
        }
    }

    // Show single post. 
    protected function post($id) {
        
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            exit();
        }

        $results = $stmt->fetchAll();
        return $results;
        $stmt = null;

    }

    // Edit single post. 
    protected function edit($title, $text, $id) {

        $sql = "UPDATE posts SET title = ?, text = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($title, $text, $id))) {
            $stmt = null;
            exit();
        }

        $stmt = null;
    }

    // Delete single post.
    protected function delete($id) {

        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

        $stmt = null;
    }
}