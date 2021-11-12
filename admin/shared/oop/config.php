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
        public $form;
        public $stream;
        public $hostel;
        public $fname;
        public $mname;
        public $lname;
        public $gender;
        public $pname;
        public $pnumber;
        public $email;
        public $adm_date;


        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create($query= '', $params='')
        {   
            $this->adm = htmlspecialchars(strip_tags($this->adm));
            $this->form = htmlspecialchars(strip_tags($this->form));
            $this->stream = htmlspecialchars(strip_tags($this->stream));
            $this->hostel = htmlspecialchars(strip_tags($this->hostel));
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->mname = htmlspecialchars(strip_tags($this->mname));
            $this->lname = htmlspecialchars(strip_tags($this->lname));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->pname = htmlspecialchars(strip_tags($this->pname));
            $this->pnumber = htmlspecialchars(strip_tags($this->pnumber));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->adm_date = htmlspecialchars(strip_tags($this->adm_date));

            $query = 'INSERT INTO '.$this->tablename.' SET adm_num=:num, form=:form, stream=:stream, hostel=:hostel, first_name:fname, mid_name=:mname, last_name=:lname, gender=:gender, pname=:pname,p_email=:email, p_phone_number=:pnum, adm_date=:date';
            $stmt = $this->conn->prepare($query);
            $params = [
                ':num'=>$this->adm, 
                ':form'=>$this->form, 
                ':stream'=>$this->stream,
                ':hostel'=>$this->hostel, 
                ':fname'=>$this->fname,
                ':mname'=>$this->mname, 
                ':lname'=>$this->lname, 
                ':gender'=>$this->gender, 
                ':pname'=>$this->pname,
                ':email'=>$this->email, 
                ':pnum'=>$this->pnumber, 
                ':date'=>$this->adm_date
            ];

            if($stmt->execute($params)){
                return True;
            }else{
                return False;
            }
        }

    }

    class Validation
    {
        public function validateEmail($email)
        {
            if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                return False;
            }else{
                return True;
            }
        }

        public function validatePhone($phone)
        {
            if(preg_match('/^(\+254)\d{9}$/', $phone)){
                return True;
            }else{
                return False;
            }
        }
    }

    $database = new Database();
    $database->getConn();
    $newst = new Students($database);
    $newst->create()
?>