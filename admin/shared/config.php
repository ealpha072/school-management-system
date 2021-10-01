<?php 
    session_start();

    $dsn = "mysql:host=localhost;dbname=scms;charset=utf8mb4";
    $password = "";
    $username = "root";

    //try the connection
    try{
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Connection went well!!";
    } catch (Exception $e) {
        //throw $th;
        //echo "Connection failed".$e->getMessage();
    }

    //SQL statements
    $sql1 = $conn->prepare("SELECT * FROM `admin` WHERE username=? AND password =? ");


    if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"]=="POST"){ 
        login();
    }



    function login() {
        global $sql1;
        $username = $_POST["username"];
        $password = $_POST["password"];
        $sql1->execute(array($username, $password));
        $results = $sql1->fetchAll(PDO::FETCH_ASSOC);

        if($username ==='' || $password===''){
            exit("Error logging you in, please check your credentials and try again");
        }

        if($username===$results[0]['username'] && $password===$results[0]['password']){
            $_SESSION['loggedin'] = True;
            $_SESSION['msg'] = 'Successful login';
            echo "
                <div class=\"spinner-border\" role=\"status\">
                    <span class=\"sr-only\">Loading...</span>
                </div>
            ";
            header("refresh:5;url='../dashboard/dashboard.php'");
            exit();
        }
        
    }


?>