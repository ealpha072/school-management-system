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

    $database = new Database();
    $database->getConn();
    $access = new Access($database);

    $access->username = 'Administrator';
    $access->pass = 'Alpha';

    $access->Login();
?>