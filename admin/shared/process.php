<?php
    session_start();


    try {
        $db = new PDO('sqlite:../../mydatabase.db');
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Connection failed '.$e->getMessage();
    }

    //sql statements
    $sql_1 = $db->prepare('select * from admin where user_name=:username
            and password = :password');


    if(isset($_POST['login'])){
        login();
    }

    function login() {
        global $sql_1;
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

                require "../shared/header.php";
                require "../shared/footer.php";
                echo
                    '<div class="container h-100">
                        <div class="row h-100 justify-content-center align-items-center">
                            <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div>
                                <h1>Loading, please wait...</h1>
                            </div>
                        </div>
                    </div>';

                header('refresh:3;url=\'../dashboard/dashboard.php\'');
                exit();
            }
        }

    }
