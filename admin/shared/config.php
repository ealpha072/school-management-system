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

    //error arays
    $loginerror = array();


    //SQL statements
    $sql1 = $conn->prepare("SELECT * FROM `admin` WHERE username=? AND password =? ");
    
    


    if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"]=="POST"){ 
        login();
    }



    function login() {
        global $sql1, $loginerror;
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(count($loginerror)==0){
            $sql1->execute(array($username, $password));
            $results = $sql1->fetchAll(PDO::FETCH_ASSOC);

            if(count($results)==1){
                if($username===$results[0]['username'] && $password===$results[0]['password']){
                    $_SESSION['loggedin'] = True;
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
                    echo count($results);
                    header("refresh:3;url='../dashboard/dashboard.php'");
                    exit();
                }
            }else{
                ///when wrong username or password...
                echo 'No record found';
                array_push($loginerror, "Invalid username or password, Try again");
            }
        }
        
    }

    function displayLoginError() {
        global $loginerror;
        
        if(count($loginerror) > 0){
            echo '<div class="invalid-feedback">';
                foreach($loginerror as $error){
                    echo $error .'<br>';
                }
            echo'</div>';
        }
    }

    function newStudent() {

    }

?>