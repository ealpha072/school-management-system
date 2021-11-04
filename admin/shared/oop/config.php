<?php
    class Database{
        private $conn;

        public function getConnection(){
            try {
                $this->conn = new PDO('sqlite:../../mydatabase.db');
                return $this->conn;
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
        }

        public function Login(){
            
        }
    }

    class Person{

    }


?>