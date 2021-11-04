<?php
    session_start();


    class Database{
        private $conn;
        public $tablename = 'admin';

        public function getConnection(){
            try {
                $this->conn = new PDO('sqlite:../../mydatabase.db');
                return $this->conn;
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
        }

        public function select($query='', $param = [])
        {
            $stmt = $this->executeStatement($query, $param);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert($query='', $param = []){
            $this->executeStatement($query, $param);
        }

        public function executeStatement( $query="", $params=[] )
        {
            $stmt = $this->conn->prepare( $query );
            $stmt->execute($params);
            return $stmt;
        }
    }

    class Person{
        function __construct($db){
            return $this->
        }
        {
            
        }
    }


?>