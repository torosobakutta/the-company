<?php

class Database{

    private $server_name = 'localhost';
    private $db_name = 'the_company';
    private $username = 'root';
    private $password = 'root';

    protected $conn;
    

    public function __construct(){

        $this->conn = new mysqli($this->server_name, $this->username,
                                $this->password, $this->db_name);
        if($this->conn->connect_error){
            die('Error connecting to '. $this->db_name . ":" . $this->conn->connect_error);
        }
    }




}
?>