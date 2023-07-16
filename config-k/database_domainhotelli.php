<?php 
    class Database {
        private $host = "31.217.196.244";
        private $database_name = "ochgzqbo_weatherstation";
        private $username = "ochgzqbo_markus";
        private $password = "maBoite%data101";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>