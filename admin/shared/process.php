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

    //SQL STATEMENTS
    $login_sql = $db->prepare('select * from admin where user_name=:username
            and password = :password');

    $add_student_sql = $db->prepare('insert into
        students(
            adm_num,form,
            stream,hostel,
            first_name,mid_name, last_name,
            county, gender,
            photo,
            parent_name, p_email, p_phone_number, adm_date)
        values (
            :adm_num,:form,
            :stream,:hostel,
            :first_name,:mid_name,:last_name,
            :county,:gender,
            :photo,
            :parent_name,
            :p_email,:p_phone_num,:adm_date)'
    );
        //subject sql statements;
    $add_subject_sql = $db->prepare('insert into subjects(name, subject_type, head_of_subject, department) values(:name, :subject_type, :head_of_subject, :department)');

    $select_all_subjects_sql = $db->prepare('select name from subjects where name=:name');


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

        $adm_number = htmlspecialchars($_POST['adm_num']);
        $form = htmlspecialchars($_POST['form']);
        $stream = htmlspecialchars($_POST['stream']);
        $hostel = htmlspecialchars($_POST['hostel']);
        $adm_date = date('Y/m/d');
        $first_name = htmlspecialchars($_POST['first-name']);
        $mid_name = htmlspecialchars($_POST['middle-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $gender = htmlspecialchars($_POST['gender']);
        $county = htmlspecialchars($_POST['county']);
        $photo = htmlspecialchars($_FILES['student-photo']['name']);
        $parent_name = htmlspecialchars($_POST['pfirst-name']);
        $pemail = $_POST['pemail'];
        $pphone_number = htmlspecialchars($_POST['pphone-number']);

        //FORM VALIDATION AND INPUT PROCESSING
        //email validation
        if(!filter_var($pemail, FILTER_VALIDATE_EMAIL)){
            $email_error = "Incorrect email format, please try again";
            array_push($add_student_error, $email_error);
        }else{
            $pemail = $pemail;
        }

        //student image processing
        $target_dir = "../images/students/";
        $target_file_path = $target_dir.basename($_FILES['student-photo']['name']);
        $extension = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));

        if(file_exists($target_file_path)){
            $file_exist_error = "Photo already exists.";
            array_push($add_student_error, $file_exist_error);
        }

        if(!in_array($extension, ['jpg','png'])){
            $image_type_error = "Invalid image extension, please choose a valid format";
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
                ':photo'=>$photo,
                ':parent_name'=>$parent_name,
                ':p_email'=>$pemail,
                ':p_phone_num'=>$pphone_number,
                ':adm_date'=>$adm_date
            ));
            $_SESSION['success'] = "New student admission number ".$adm_number." added to database";
        }else{
            $addition_error = "Error adding student to database, correct below errors:";
            array_unshift($add_student_error, $addition_error);
        }
    }

    function addSubject(){
        global $add_subject_sql, $add_subject_error, $select_all_subjects_sql;

        $name = trim(htmlspecialchars($_POST['subject-name']));
        $head_of_subject= trim(htmlspecialchars($_POST['hos']));
        $subject_type= trim(htmlspecialchars($_POST['subject-type']));
        $department= trim(htmlspecialchars($_POST['department']));

        //form validation
        $select_all_subjects_sql->execute(array(':name'=>$name));
        $results = $select_all_subjects_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results)>0){
            $subject_exists_error = 'Cannot add subject: '.$name.' it already exists in database';
            array_push($add_subject_error, $subject_exists_error);
        }

        //push to database
        if(count($add_subject_error) == 0){

            $add_subject_sql->execute(array(
                ':name'=> $name,
                ':subject_type'=> $subject_type,
                ':head_of_subject'=> $head_of_subject,
                ':department'=> $department
            ));
            $_SESSION['success'] = 'Subject '.$name.' added successfully';
        }else{
            $subject_addition_error = "Error adding new subject, fix below errors";
            array_unshift($add_subject_error, $subject_addition_error);
        }

    }

    //helper functions

    function showSuccessMessage(){
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo '<div class="alert alert-success" role="alert">';
            echo $_SESSION['success'];
            echo '</div>';

            unset($_SESSION['success']);
        }
    }

    function isLoggedIn() {
        if(isset($_SESSION['userLogin'])){
            return True;
        }else{
            return False;
        }
    }

    function displayErrors($array){
        echo '<div class = "alert alert-danger">';
            echo '<ul class = "list-group">';
                foreach ($array as $error_msg) {
                    // code...
                    echo '<li>'.$error_msg.'</li>';
                }
            echo '</ul>';
        echo '</div>';
    }
