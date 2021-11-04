<?php

use function PHPSTORM_META\type;

session_start();

    class Database{
        private $conn = null;
        public $tablename = 'admin';

        public function __construct()
        {
            try {
                $this->conn = new PDO('sqlite:../../mydatabase.db');
                echo "Connection successfull";
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
        }

        
    }

    $database = new Database();


?>