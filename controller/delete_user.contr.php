<?php

class DeleteUserContr extends DeleteUser {

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct( $host, $user, $password, $database) {

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }

    // This function call deleteAcc() in model

	public function deleteUser($id) {

        $results = $this->deleteAcc($id);
       
	}

} 