<?php

    session_start();

    class Database
    {
        private $conn = null;
        public function getConn()
        {
            try {
                $this->conn = new PDO('sqlite:../../mydatabase.db');
                echo "Good conn";
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
            return $this->conn;
        }
    }

    class Students
    {   
        private $conn;
        public $tablename = 'students';
        public $adm;
        public $


        public function __construct($db)
        {
            $this->conn = $db;
        }

    }

    $database = new Database();
    $database->getConn();
    $newst = new Students($database);
?>