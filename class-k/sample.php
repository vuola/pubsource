<?php
// sample.php version 31. May 2023
// changes from previous:
//   - added method getLatestNSamples() required by readGoogleChart.php

    class Sample{

        // Connection
        private $conn;

        // Table
        private $db_table = "mittaukset";

        // Columns
        public $time;
        public $lampotilaVesimittari;
        public $lampotilaHuone;
        public $kosteusKukka;
        public $janniteVesimittari;
        public $janniteHuone;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getSamples(){
            $sqlQuery = "SELECT time, lampotilaVesimittari, lampotilaHuone, kosteusKukka, janniteVesimittari, janniteHuone FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createSample(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        lampotilaVesimittari = :lampotilaVesimittari, 
                        lampotilaHuone = :lampotilaHuone, 
                        kosteusKukka = :kosteusKukka, 
                        janniteVesimittari = :janniteVesimittari, 
                        janniteHuone = :janniteHuone";
                        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->lampotilaVesimittari=htmlspecialchars(strip_tags($this->lampotilaVesimittari));
            $this->lampotilaHuone=htmlspecialchars(strip_tags($this->lampotilaHuone));
            $this->kosteusKukka=htmlspecialchars(strip_tags($this->kosteusKukka));
            $this->janniteVesimittari=htmlspecialchars(strip_tags($this->janniteVesimittari));
            $this->janniteHuone=htmlspecialchars(strip_tags($this->janniteHuone));
        
            // bind data
            $stmt->bindParam(":lampotilaVesimittari", $this->lampotilaVesimittari);
            $stmt->bindParam(":lampotilaHuone", $this->lampotilaHuone);
            $stmt->bindParam(":kosteusKukka", $this->kosteusKukka);
            $stmt->bindParam(":janniteVesimittari", $this->janniteVesimittari);
            $stmt->bindParam(":janniteHuone", $this->janniteHuone);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // READ single
        public function getSingleSample(){
            $sqlQuery = "SELECT
                        time, 
                        lampotilaVesimittari, 
                        lampotilaHuone, 
                        kosteusKukka, 
                        janniteVesimittari, 
                        janniteHuone
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       time = ?
                    LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->time);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->lampotilaVesimittari = $dataRow['lampotilaVesimittari'];
            $this->lampotilaHuone = $dataRow['lampotilaHuone'];
            $this->kosteusKukka = $dataRow['kosteusKukka'];
            $this->janniteVesimittari = $dataRow['janniteVesimittari'];
            $this->janniteHuone = $dataRow['janniteHuone'];
        }        

        // READ latest
        public function getLatestSample(){
            $sqlQuery = "SELECT
                        time, 
                        lampotilaVesimittari, 
                        lampotilaHuone, 
                        kosteusKukka, 
                        janniteVesimittari, 
                        janniteHuone
                      FROM
                        ". $this->db_table ."
                    ORDER BY 
                       time
                    DESC LIMIT 1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->time = $dataRow['time'];
            $this->lampotilaVesimittari = $dataRow['lampotilaVesimittari'];
            $this->lampotilaHuone = $dataRow['lampotilaHuone'];
            $this->kosteusKukka = $dataRow['kosteusKukka'];
            $this->janniteVesimittari = $dataRow['janniteVesimittari'];
            $this->janniteHuone = $dataRow['janniteHuone'];
        }        

        // GET LATEST N SAMPLES
        public function getLatestNSamples($n){
            $sqlQuery = "SELECT 
                        time, 
                        lampotilaVesimittari, 
                        lampotilaHuone, 
                        kosteusKukka, 
                        janniteVesimittari, 
                        janniteHuone 
                    FROM 
                        ". $this->db_table ."
                    ORDER BY
                        time
                    DESC LIMIT " . $n;

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // UPDATE
        public function updateSample(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        time = :time, 
                        lampotilaVesimittari = :lampotilaVesimittari, 
                        lampotilaHuone = :lampotilaHuone, 
                        kosteusKukka = :kosteusKukka, 
                        janniteVesimittari = :janniteVesimittari,
                        janniteHuone = :janniteHuone
                    WHERE 
                        time = :time";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->lampotilaVesimittari=htmlspecialchars(strip_tags($this->lampotilaVesimittari));
            $this->lampotilaHuone=htmlspecialchars(strip_tags($this->lampotilaHuone));
            $this->kosteusKukka=htmlspecialchars(strip_tags($this->kosteusKukka));
            $this->janniteVesimittari=htmlspecialchars(strip_tags($this->janniteVesimittari));
            $this->janniteHuone=htmlspecialchars(strip_tags($this->janniteHuone));
            $this->time=htmlspecialchars(strip_tags($this->time));
        
            // bind data
            $stmt->bindParam(":lampotilaVesimittari", $this->lampotilaVesimittari);
            $stmt->bindParam(":lampotilaHuone", $this->lampotilaHuone);
            $stmt->bindParam(":kosteusKukka", $this->kosteusKukka);
            $stmt->bindParam(":janniteVesimittari", $this->janniteVesimittari);
            $stmt->bindParam(":janniteHuone", $this->janniteHuone);
            $stmt->bindParam(":time", $this->time);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteSample(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE time = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->time=htmlspecialchars(strip_tags($this->time));
        
            $stmt->bindParam(1, $this->time);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>