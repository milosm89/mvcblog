<?php

class DeleteUser extends Dbh {

    // Delete User
	public function deleteAcc($id) {

        $results;
        $user;
		
        $sql = "DELETE FROM posts WHERE user_id = ?";
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute(array($id))) {
            $stmt = null;
            exit();
        }

	}
}