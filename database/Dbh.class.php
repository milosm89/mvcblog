<?php

//Database connection.
class Dbh {

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($host, $user, $password, $database) {

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }

    protected function connect() {

        try {
            $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->user, $this->password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!" . $e->getMessage();
            die();
        }
    }
}