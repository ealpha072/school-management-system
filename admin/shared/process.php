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
    $add_student_error = [];
    $add_subject_error = [];

    //sql statements
    $login_sql = $db->prepare('select * from admin where user_name=:username
            and password = :password');

    $add_student_sql = $db->prepare('insert into
        students(
            adm_num,form,
            stream,hostel,
            first_name,mid_name, last_name,
            county, gender,
            nationality, photo,
            p_first_name, p_mid_name, p_last_name,
            p_email, p_phone_number, adm_date)
        values (
            :adm_num,:form,
            :stream,:hostel,
            :first_name,:mid_name,:last_name,
            :county,:gender,
            :nationality,:photo,
            :p_first_name,:p_mid_name,:p_last_name,
            :p_email,:p_phone_num,:adm_date)'
    );

    $add_subject_sql = $db->prepare('insert into subjects(name, subject_type, head_of_subject, department) values(:name, :subject_type, :head_of_subject, :department)');


    //button pushes
    if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD']=='POST'){
        login();
    }

    if(isset($_POST['add-student']) && $_SERVER['REQUEST_METHOD']=='POST'){
        addStudent();
    }

    if(isset($_POST['add-subject']) && $_SERVER['REQUEST_METHOD']=='POST'){
        addSubject();
    }



    //main functions
    function login() {
        global $login_sql, $login_error;

        $username = $_POST['username'];
        $password = $_POST['password'];

        $login_sql->execute(array(
            ':username'=> $username,
            ':password'=>$password,
        ));

        $results = $login_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results)==1){
            if($username === $results[0]['user_name'] && $password === $results[0]['password']){

                $_SESSION['userLogin'] = $username;
                $_SESSION['msg'] = 'Successful login';

                header('location: ../shared/login_switch.php');
                exit();
            }
        }else{

            $error = 'Wrong username or password, please try again';
            array_push($login_error, $error);
        }

    }

    function addStudent(){
        global $add_student_sql, $add_student_error;

        $adm_number = $_POST['adm_num'];
        $form = $_POST['form'];
        $stream = $_POST['stream'];
        $hostel = $_POST['hostel'];
        $adm_date = date('Y/m/d');
        $first_name = $_POST['first-name'];
        $mid_name = $_POST['middle-name'];
        $last_name = $_POST['last-name'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $county = $_POST['county'];
        $photo = $_FILES['student-photo']['name'];
        $pfirst_name = $_POST['pfirst-name'];
        $pmid_name = $_POST['pmid-name'];
        $plast_name = $_POST['plast-name'];
        $pemail = $_POST['pemail'];
        $pphone_number = $_POST['pphone-number'];

        //form validation

        //student image processing
        $target_dir = "../images/students/";
        $target_file_path = $target_dir.basename($_FILES['student-photo']['name']);
        $extension = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));

        if(file_exists($target_file_path)){
            $file_exist_error = "Photo already exists.";
            array_push($add_student_error, $file_exist_error);
        }

        if(!in_array($extension, ['jpg','png'])){
            $image_type_error = "Invalid image extension";
            array_push($add_student_error, $image_type_error);
        }

        if($_FILES['student-photo']['size'] > 5000000){
            $image_size_error = "The image size is too large";
            array_push($add_student_error, $image_size_error);
        }

        //add to database
        if(count($add_student_error)==0){
            move_uploaded_file($_FILES['student-photo']['tmp_name'], $target_file_path);

            $add_student_sql->execute(array(
                ':adm_num'=>$adm_number,
                ':form'=>$form,
                ':stream'=>$stream,
                ':hostel'=>$hostel,
                ':first_name'=>$first_name,
                ':mid_name'=>$mid_name,
                ':last_name'=>$last_name,
                ':county'=>$county,
                ':gender'=>$gender,
                ':nationality'=>$nationality,
                ':photo'=>$photo,
                ':p_first_name'=>$pfirst_name,
                ':p_mid_name'=>$pmid_name,
                ':p_last_name'=>$plast_name,
                ':p_email'=>$pemail,
                ':p_phone_num'=>$pphone_number,
                ':adm_date'=>$adm_date
            ));
            $_SESSION['success'] = "New student admission number ".$adm_number." added to database";
        }
    }

    function addSubject(){
        global $add_subject_sql;
        $name = htmlspecialchars($_POST['subject-name']);
        $head_of_subject=htmlspecialchars($_POST['hos']);
        $subject_type=htmlspecialchars($_POST['subject-type']);
        $department=htmlspecialchars($_POST['department']);

        //form validation

        //push to database
        $add_subject_sql->execute(array(
            ':name'=> $name,
            ':subject_type'=> $subject_type,
            ':head_of_subject'=> $head_of_subject,
            ':department'=> $department
        ));
        $_SESSION['success'] = 'Subject '.$name.' added successfully';
    }

    //helper functions
    function displayErrors() {
        global $login_error, $add_student_error, $add_subject_error;

        if(isset($login_error) && !empty($login_error)){
            echo '<div class = "alert alert-danger">';
            foreach ($login_error as $error) {
                // code...
                echo $error.'<br>';
            }
            echo '</div>';
        }
    }

    function showSuccessMessage(){
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION['success'];
            echo '</div>';

            unset($_SESSION['success']);
            unset($_SESSION['adm']);
        }
    }

    function isLoggedIn() {
        if(isset($_SESSION['userLogin'])){
            return True;
        }else{
            return False;
        }
    }
