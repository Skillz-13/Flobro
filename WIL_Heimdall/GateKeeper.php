<?php

// used to get mysql database connection
class GateKeeper{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "bostoczw_Test";
    private $username = "root";
    private $password = "";
    public $DBconnect;

    // get the database connection
    public function getConnection(){

        $this->DBconnect = null;

        try{
            $this->DBconnect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            echo "Connection Successful";
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->DBconnect;
    }
}

