<?php

//Database connection.
class Dbh {

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "mvc";

    protected function connect() {

        try {
            $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . '', $this->username, $this->password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!" . $e->getMessage();
            die();
        }
    }
}