<?php
    session_start();


    try {
        $db = new PDO('sqlite:../../mydatabase.db');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Connection to database failed '.$e->getMessage();
    }

    //declairing error variables
    $login_error = [];

    //sql statements
    $sql_1 = $db->prepare('select * from admin where user_name=:username
            and password = :password');


    if(isset($_POST['login'])){
        login();
    }

    function login() {
        global $sql_1, $login_error;

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_1->execute(array(
            ':username'=> $username,
            ':password'=>$password,
        ));

        $results = $sql_1->fetchAll(PDO::FETCH_ASSOC);

        if(count($results)==1){
            if($username === $results[0]['user_name'] && $password === $results[0]['password']){

                $_SESSION['userLogin'] = $username;
                $_SESSION['msg'] = 'Successful login';

                header('location: ../shared/login_switch.php');
                exit();
            }
        }else{

            $error = 'Could not find your credentials, please try again';
            array_push($login_error, $error);
        }

    }

    function displayLoginErrors() {
        global $login_error;

        if(count($login_error)>0){
            echo '<div class=\'errordiv\'>';
                foreach ($login_error as $error) {
                    // code...
                    echo $error.'<br>';
                }
        }
    }

    function isLoggedIn() {
        if(isset($_SESSION['userLogin'])){
            return True;
        }else{
            return False;
        }
    }
