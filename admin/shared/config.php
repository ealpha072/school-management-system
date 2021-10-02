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
    $sql2 = $conn->prepare("INSERT INTO students(adm_num,form,stream,hostel,first_name,mid_name, last_name, 
    county, gender, nationality, photo, p_first_name, p_mid_name, p_last_name, p_email, p_phone, adm_date) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    
    


    if(isset($_POST['login']) && $_SERVER["REQUEST_METHOD"]=="POST"){ 
        login();
    }

    if(isset($_POST['add-student']) && $_SERVER['REQUEST_METHOD']=='POST'){
        newStudent();
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
                    $_SESSION['userLogin'] = 'admin';
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
        global $sql2;
        $error = array();

        $adm_number = $_POST['adm_num'];
        $form = $_POST['form'];
        $stream = $_POST['stream'];
        $hostel = $_POST['hostel'];
        $adm_date = $_POST['adm-date'];
        $first_name = $_POST['first-name'];
        $mid_name = $_POST['mid-name'];
        $last_name = $_POST['last-name'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $county = $_POST['county'];
        $photo = $_FILES['student-photo']['name'];
        $pfirst_name = $_POST['pfirst_name'];
        $pmid_name = $_POST['pmid_name'];
        $plast_name = $_POST['plast_name'];
        $pemail = $_POST['pemail'];
        $pphone_number = $_POST['pphone_number'];

        //form-validation

        //student image...
        $target_dir = "../images/students";
        $target_file_path = $target_dir.basename($_FILES['student-photo']['name']);
        $extension = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));

        if(file_exists($target_dir)){
            $file_exist_error = "Photo already exists.";
            array_push($error, $file_exist_error);
        }

        if(!in_array($extension, ['jpg','png'])){
            $image_type_error = "Invalid image extension";
            array_push($error, $image_type_error);
        }

        if($_FILES['student-photo']['size'] > 5000000){
            $image_size_error = "The image size is too large";
            array_push($error, $image_size_error);
        }

        //add student
        if(count($error)==0){
            move_uploaded_file($_FILES['student-photo']['tmp_name'],$target_file_path);
                
            $sql2->execute(array($adm_number,$form, $stream, $hostel, $first_name, $mid_name, $last_name, $county, 
                $gender, $nationality, $photo, $pfirst_name, $pmid_name, $plast_name, $pemail, $pphone_number, $adm_date));
            
            echo "New student added successfully";
        }


    }

?>