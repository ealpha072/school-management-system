<?php

use Database as GlobalDatabase;

    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class Database
    {
        public $conn = null;
        public function getConn()
        {
            try {
                $this->conn = new PDO('sqlite:../mydatabase.db');
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
            return $this->conn;
        }
    }
?>