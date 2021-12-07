<?php 
    include_once('server.php');

    class Access{
        private $conn;

        public $table = 'admin';
        public $username;
        public $pass;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function Login (){
            $sql = 'select * from '.$this->table. ' WHERE user_name=:username'; 
            $login_errors = [];

            $this->username = htmlspecialchars(strip_tags( $this->username));
            $this->pass = $this->pass;

            $stmt = $this->conn->conn->prepare($sql);

            $stmt->bindParam(':username', $this->username);

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($results) === 1){
                if($this->username === $results[0]['user_name'] && password_verify($this->pass, $results[0]['password'])){
                    //$_SESSION['user'] = $this->username;
                    //$_SESSION['msg'] = 'Success loging in';
                    echo 'Match found in database';
                }else{
                    array_push($login_errors, 'Wrong password or username');
                }
            }else{
                array_push($login_errors, 'Unable to find user');
            }

            if(count($login_errors) === 0){
                echo 'Login success';
            }else{
                echo 'Error loging in';
                var_dump($login_errors);
            }

        }
    }

    Class Student{
        //STUDENT DETAILS
        public $id;
        public $adm_num;
        public $form;
        public $stream;
        public $hostel;
        public $first_name;
        public $mid_name;
        public $last_name;
        public $gender;
        public $parent_name;
        public $p_phone_number;
        public $p_email;
        public $adm_date;
        //PARENT DETAILS
        
        public $phone_number;
        public $email;
        public $childs_na;

        public $table1 = 'students';
        public $table2 = 'parents';

        private $conn;

        public function __construct($db)
        {
            $this->conn = $db; 
        }

        public function Addstudent(){
            $errors = [];
            $sql =  'INSERT INTO '.$this->table.'
                SET 
                adm_num:adm_num,
                form:form,
                stream:stream,
                hostel:hostel,
                first_name:fname,
                mid_name:mname, 
                last_name:lname,
                gender:gender,
                parent_name:pname, 
                p_email:email, 
                p_phone_number:phone, 
                adm_date: date
            ';
            $stmt =  $this->conn->conn->prepare($sql);

            $this->adm_num = htmlspecialchars(strip_tags($this->adm_num));
            $this->form = htmlspecialchars(strip_tags($this->form));
            $this->stream = htmlspecialchars(strip_tags($this->stream));
            $this->hostel = htmlspecialchars(strip_tags($this->hostel));
            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->mid_name = htmlspecialchars(strip_tags($this->mid_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->parent_name = htmlspecialchars(strip_tags($this->parent_name));
            $this->p_phone_number = htmlspecialchars(strip_tags($this->p_phone_number));
            $this->p_email = htmlspecialchars(strip_tags($this->p_email));

            ///validate;
            if(!filter_var($this->p_email, FILTER_VALIDATE_EMAIL)){
                array_push($add_student_error,  "Incorrect email format, please try again");
            }

            //validate phone number

            //check if last name emoty

            //check if parent name taken
            $sql2 = 'SELECT email FROM '.$this->table2. ' WHERE email:email';
            $stmt2 = $this->conn->conn->prepare($sql2);
            $stmt->bindParam(':email', $this->p_email);

            $stmt2->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //check if adm num is taken


            if(count($results) > 0){
                array_push($errors, 'Email already taken');
            }

            if(count($errors) === 0){
                $date= date('Y/m/d');
                $stmt->bindParam(':adm_num',$this->adm_number);
                $stmt->bindParam(':form',$this->form);
                $stmt->bindParam(':stream',$this->stream);
                $stmt->bindParam(':hostel',$this->hostel);
                $stmt->bindParam(':first_name',$this->fname);
                $stmt->bindParam(':mid_name',$this->mname);
                $stmt->bindParam(':last_name',$this->lname);
                $stmt->bindParam(':gender',$this->gender);
                $stmt->bindParam(':parent_name',$this->pname);
                $stmt->bindParam(':p_email',$this->email);
                $stmt->bindParam(':p_phone_num',$this->phone);
                $stmt->bindParam(':adm_date',$this->date);

                $sql3 = 'INSERT INTO '.$this->table2. ' 
                    SET

                    ';


            }







            

        }
    }
?>