<?php
    session_start();

    try {
        $db = new PDO('sqlite:../../mydatabase.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Connection to database failed '.$e->getMessage();
    }

    //declairing error variables
    $login_error = $add_student_error = $add_subject_error = $add_teacher_error = $add_staff_error = $add_hostel_error = $add_role_error = $add_stream_error = $update_student_error = $update_subject_error = $update_teacher_error = $update_staff_error = $update_role_error = $update_hostel_error = array();

    //SQL STATEMENTS -- Below queries have been utilised by the functions in this page
    $login_sql = $db->prepare('select * from admin where user_name=:username and password = :password');
    $add_student_sql = $db->prepare('insert into
        students(
            adm_num,form,
            stream,hostel,
            first_name,mid_name, last_name,
            gender,
            parent_name, p_email, p_phone_number, adm_date)
        values (
            :adm_num,:form,
            :stream,:hostel,
            :first_name,:mid_name,:last_name,
            :gender,
            :parent_name,
            :p_email,:p_phone_num,:adm_date)'
    );
    $select_all_students_sql = $db->prepare('select adm_num, stream from students where adm_num=:adm and stream=:stream');
    $add_parent_sql = $db->prepare('insert into parents(parent_name, phone_number, email, childs_name)
        values(:parent_name, :phone_number, :email, :childs_name)');
    $select_all_parents_sql = $db->prepare('select email from parents where email = :email');
    $add_subject_sql = $db->prepare('insert into subjects(name, subject_type, head_of_subject, department)
        values(:name, :subject_type, :head_of_subject, :department)');
    $select_all_subjects_sql = $db->prepare('select name from subjects where name=:name');
    $add_teacher_sql = $db->prepare('insert into
        teachers (
            first_name, mid_name, last_name,
            gender,email,
            phone_number,
            role, subject_1, subject_2, date)
        values(
            :first_name, :mid_name, :last_name,
            :gender,:email,
            :phone_number,
            :role, :subject_1, :subject_2, :date
        )');

    $select_teacher_sql = $db->prepare('select email from teachers where email=:email');
    $add_staff_sql = $db->prepare('insert into support_staff (
            first_name, mid_name, last_name, email, phone_number,
            role, date_employed, gender)
        values(
            :first_name, :mid_name, :last_name, 
            :email, :phone_number, 
            :role, :date_employed,:gender
    )');
    $select_staff_sql = $db->prepare('select email from support_staff where email=:email');
    $add_hostel_sql =$db->prepare('insert into hostels (name, teacher_incharge)
        values (:name, :teacher)');

    $select_hostel_sql = $db->prepare('select name from hostels where name = :name');
    $add_role_sql = $db->prepare('insert into
        staff_roles(role_name, staff_type, staff_name, date_created)
        values(:role_name, :staff_type, :staff_name, :date_created)');
    $add_stream_sql = $db->prepare('insert into streams(name) values(:name)');
    $select_stream_sql = $db->prepare('select name from streams where name = :name');

    //SQL STATEMENTS--these qeuries are executed in different pages mainly for select option population
    $select_teacher = $db->prepare('select * from teachers');
    $select_department = $db->prepare('select dpt_name from departments');
    $select_subjects = $db->prepare('select name from subjects');
    $select_classes = $db->prepare('select name from forms');
    $select_stream = $db->prepare('select name from streams');
    $select_staff = $db->prepare('select * from support_staff');
    $select_role = $db->prepare('select * from staff_roles');
    $select_student = $db->prepare('select * from students');
    $select_hostel = $db->prepare('select * from hostels');
    $select_parent = $db->prepare('select * from parents');
    $select_support_staff = $db->prepare('select * from support_staff');
    $select_roles = $db->prepare('select * from staff_roles where staff_type=:type and staff_name=:name');
    //DELETE QUERIES
    $delete_student = $db->prepare('delete from students where id=:id');
    $delete_parent = $db->prepare('delete from parents where email=:email');
    $delete_teacher = $db->prepare('delete from teachers where id=:id');
    $delete_staff = $db->prepare('delete from support_staff where id =:id');
    ///UPDATE QUERIES
    $update_student_query = $db->prepare('UPDATE students set hostel=?, form=?, stream=?, p_email=?, p_phone_number=? where id=?');
    $update_subject_query = $db->prepare('UPDATE subjects set subject_type=?, head_of_subject=? where id=?');
    $update_teacher_query = $db->prepare('UPDATE teachers set email=?,phone_number=?,role=? where id=?');
    $update_staff_query = $db->prepare('UPDATE support_staff set email=?, phone_number=? where id=?');
    $update_role = $db->prepare('UPDATE staff_roles set staff_name=? where role_name=?');
    $update_role2 = $db->prepare('UPDATE support_staff set role=? where first_name=? and mid_name=? and last_name=?');
    $update_hostel_query = $db->prepare('UPDATE hostels set teacher_incharge=? where id=?');
    $update_settings = $db->prepare('UPDATE admin set image=?');

    //BUTTON PUSHES ---ADD NEW RECORDS TO DATABASE
    if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD']=='POST'){
        login();
    }

    if(isset($_POST['add-student']) && $_SERVER['REQUEST_METHOD']=='POST'){
        addStudent();
    }

    if(isset($_POST['add-subject']) && $_SERVER['REQUEST_METHOD']=='POST'){
        addSubject();
    }

    if(isset($_POST['add-teacher']) && $_SERVER['REQUEST_METHOD']=='POST'){
        addTeacher();
    }

    if(isset($_POST['add-staff']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        addStaff();
    }

    if(isset($_POST['add-hostel']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        addHostel();
    }

    if(isset($_POST['add-role']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        addRole();
    }

    if(isset($_POST['add-stream']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        addStream();
    }

    //UPDATE BUTTONS
    if(isset($_POST['update-student']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateStudent();
    }

    if(isset($_POST['update-subject']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateSubject();
    }

    if(isset($_POST['update-teacher']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateTeacher();
    }

    if(isset($_POST['update-staff']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateStaff();
    }

    if(isset($_POST['update-role']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateRole();
    }

    if(isset($_POST['update-hostel']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateHostel();
    }

    if(isset($_POST['update-image']) && $_SERVER['REQUEST_METHOD']==='POST'){
        updateImage();
    }


    
    //DELETE BUTTONS
    if(isset($_POST['delete-student'])){
        $delete_id = $_SESSION['delete_id'];
        $delete_email = $_SESSION['email'];
        $delete_student->execute(array(':id'=>$delete_id));
        $delete_parent->execute(array('email'=>$delete_email));
        $_SESSION['success'] = 'Deleted record successfully';
        unset($_SESSION['delete_id'], $_SESSION['email']);
        header('location: managest.php');
    }

    if(isset($_POST['delete-teacher'])){
        $teacher_id = $_SESSION['delete_tid'];
        $delete_teacher->execute(array(':id'=>$teacher_id));
        $_SESSION['success'] = 'Deleted teacher successfully';
        unset($_SESSION['delete_tid']);
        header('location: manageteach.php');
    }

    if(isset($_POST['delete-staff'])){
        $delete_id = $_SESSION['delete_id'];
        $delete_staff->execute(array(':id'=>$delete_id));
        $_SESSION['success'] = 'Deleted staff successfully!!!';
        unset($_SESSION['delete_id']);
        header('location: managestaff.php');
    }

    if(isset($_POST['delete-role'])){
        $delete_id  = $_SESSION['delete_id'];
        $delete_role = $db->prepare('delete from staff_roles where id=:id');
        $delete_role->execute(array(':id'=>$delete_id));
        $_SESSION['success'] = 'Role deleted successfully';
        unset($_SESSION['delete_id']);
        header('location: managerole.php');
    }

    //RESPONSE TEXTS FOR AJAX REQUESTS
    require 'includes.php';

    //..........MAIN FUCTIONS HERE......................//
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
                $_SESSION['img'] = $results[0]['image'];

                header('location: ../shared/login_switch.php');
                exit();
            }
        }else{
            $error = 'Wrong username or password, please try again';
            array_push($login_error, $error);
        }
    }

    function addStudent(){
        global $add_student_sql, $add_student_error, $select_all_students_sql,
        $add_parent_sql, $select_all_parents_sql;

        $adm_number = htmlspecialchars($_POST['adm_num']);
        $form = htmlspecialchars($_POST['form']);
        $stream = htmlspecialchars($_POST['stream']);
        $hostel = htmlspecialchars($_POST['hostel']);
        $adm_date = date('Y/m/d');
        $first_name = htmlspecialchars($_POST['first-name']);
        $mid_name = htmlspecialchars($_POST['middle-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $gender = htmlspecialchars($_POST['gender']);
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

        if(empty($last_name)){
            $last_name = ' ';
        }

        //check if student exists;
        $select_all_students_sql->execute(array(
            ':adm'=>$adm_number,
            'stream'=>$stream
        ));
        //check if parents email is taken
        $select_all_parents_sql->execute(array(':email'=>$pemail));

        $results_select_students = $select_all_students_sql->fetchAll(PDO::FETCH_ASSOC);
        $results_select_parents_email = $select_all_parents_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results_select_students) > 0){
            $student_exists_error = 'Cannot add student, the adm number: '.$adm_number.' is already taken.';
            array_push($add_student_error, $student_exists_error);
        }

        if(count($results_select_parents_email) > 0){
            $email_exists_error = "Parent's email is already taken";
            array_push($add_student_error, $email_exists_error);
        }

        //add new student and parent to database
        if(count($add_student_error) == 0){

            $add_student_sql->execute(array(
                ':adm_num'=>$adm_number,
                ':form'=>$form,
                ':stream'=>$stream,
                ':hostel'=>$hostel,
                ':first_name'=>$first_name,
                ':mid_name'=>$mid_name,
                ':last_name'=>$last_name,
                ':gender'=>$gender,
                ':parent_name'=>$parent_name,
                ':p_email'=>$pemail,
                ':p_phone_num'=>$pphone_number,
                ':adm_date'=>$adm_date
            ));

            $add_parent_sql->execute(array(
                ':parent_name'=>$parent_name,
                ':phone_number'=>$pphone_number,
                ':email'=>$pemail,
                ':childs_name'=>$first_name.' '.$mid_name.' '. $last_name
            ));

            $_SESSION['success'] = "New student, admission number ".$adm_number.", added to database";
        }else{
            $addition_error = "Error adding student to database, correct below errors:";
            array_unshift($add_student_error, $addition_error);
        }
    }

    function addTeacher(){
        global $add_teacher_error, $add_teacher_sql, $select_teacher_sql;

        $first_name = htmlspecialchars($_POST['first-name']);
        $mid_name = htmlspecialchars($_POST['mid-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $gender = htmlspecialchars($_POST['teacher-gender']);
        $email = htmlspecialchars($_POST['email']);
        $phone_number = htmlspecialchars($_POST['phone-number']);
        $subject_1 = htmlspecialchars($_POST['subject-1']);
        $subject_2 = htmlspecialchars($_POST['subject-2']);
        $role = htmlspecialchars($_POST['teacher-role']);
        $date = date('Y/m/d');

        //FORM VALIDATION


        //check if teachers email is already taken
        $select_teacher_sql ->execute(array(':email'=>$email));
        $results  = $select_teacher_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0){
            $teacher_exits_error = "Email address is already taken, try a different one.";
            array_push($add_teacher_error, $teacher_exits_error);
        }

        if(empty($last_name)){
            $last_name = ' ';
        }

        if(count($add_teacher_error) == 0){

            $add_teacher_sql->execute(array(
                ':first_name'=> $first_name ,
                ':mid_name'=> $mid_name ,
                ':last_name'=> $last_name,
                ':gender'=> $gender,
                ':email'=> $email,
                ':phone_number'=> $phone_number,
                ':role'=> $role,
                ':subject_1'=> $subject_1,
                ':subject_2'=> $subject_2,
                ':date'=>$date
            ));
            $_SESSION['success'] = "New Teacher, added succesfully to database";
        }else{
            $teacher_addition_error = "Failed to add techer to database, please correct below errors";
            array_unshift($add_teacher_error, $teacher_addition_error);
        }
    }

    function addStaff(){
        global $add_staff_sql, $add_staff_error, $select_staff_sql;

        $first_name = htmlspecialchars($_POST['first-name']);
        $mid_name = htmlspecialchars($_POST['mid-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $email = htmlspecialchars($_POST['email']);
        $gender = htmlspecialchars($_POST['gender']);
        $phone_number = htmlspecialchars($_POST['phone-number']);
        $role = htmlspecialchars($_POST['staff-role']);
        $date = date('Y/m/d');

        //FORM VALIDATION

        //Check if email is taken
        $select_staff_sql->execute(array(':email'=>$email));
        $results = $select_staff_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0){
            $staff_exists_error = "Email is already taken, try a different one";
            array_push($add_staff_error, $staff_exists_error);
        }
        
        if(empty($last_name)){
            $last_name = ' ';
        }

        //push to database
        if(count($add_staff_error) == 0){

            $add_staff_sql->execute(array(
                ':first_name'=>$first_name,
                ':mid_name'=>$mid_name,
                ':last_name'=>$last_name,
                ':email'=>$email,
                ':phone_number'=>$phone_number,
                ':role'=>$role,
                ':date_employed'=>$date,
                ':gender'=>$gender,
            ));

            $_SESSION['success'] = "New support satff added succesfully to database";
        }else{
            $staff_addition_error = "Failed to add staff to database, please correct below errors";
            array_unshift($add_staff_error, $staff_addition_error);
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

        //check if exists

        if(count($results)>0){
            $subject_exists_error = 'Cannot add subject: '.$name.' it already exists in database. Try a different name';
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

    function addHostel(){
        global $add_hostel_sql, $add_hostel_error, $select_hostel_sql;

        $name = htmlspecialchars($_POST['name']);
        $teacher = htmlspecialchars($_POST['teacher']);

        //check if exists

        $select_hostel_sql->execute(array(':name'=>$name));
        $results = $select_hostel_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0){
            $hostel_exists_error = "Hostel name is already taken, try a different name";
            array_push($add_hostel_error, $hostel_exists_error);
        }

        //push to database

        if(count($add_hostel_error) == 0){
             $add_hostel_sql->execute(array(':name'=>$name, ':teacher'=>$teacher));
            $_SESSION['success'] = 'New hostel added to database';
        }else{
            $hostel_addition_error = "Unable to add hostel, correct below errors and try again";
            array_unshift($add_hostel_error, $hostel_addition_error);
        }
    }

    function addRole(){
        global $add_role_sql, $add_role_error;

        $role_name = htmlspecialchars($_POST['role-name']);
        $staff_type = htmlspecialchars($_POST['staff-type']);
        $staff_name = htmlspecialchars($_POST['staff-name']);
        $date = date('Y/m/d');


        //form validation
        //check if exists

        //push to databse
        if(count($add_role_error) == 0){
            $add_role_sql->execute(array(
                ':role_name'=> $role_name,
                ':staff_type'=> $staff_type,
                ':staff_name'=> $staff_name,
                ':date_created'=> $date
            ));
            $_SESSION['success'] = "New role, added to database successfully";
        }else{
            $role_addition_error = 'Unable to add role to database, correct below errors and try again';
            array_unshift($add_role_error, $role_addition_error);
        }
    }

    function addStream(){
        global $add_stream_sql, $add_stream_error, $select_stream_sql;


        $name = htmlspecialchars($_POST['stream-name']);
        $select_stream_sql->execute(array(':name'=>$name));
        $results = $select_stream_sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($results) > 0){
            $stream_exists_error = 'Stream name already taken, please choose new name';
            array_push($add_stream_error, $stream_exists_error);
        }

        //form validation
        //push to database
        if(count($add_stream_error) == 0){
            $add_stream_sql->execute(array(':name'=>$name));
            $_SESSION['success'] = 'New stream added successfully to database';
        }else{
            $stream_addition_error = 'Error adding new stream, please fix below issues';
            array_unshift($add_stream_error, $stream_addition_error);
        }
    }

    // UPDATE RECORDS
    function updateStudent(){
        global $update_student_error, $update_student_query;

        $hostel = htmlspecialchars($_POST['hostel-update']);
        $form_name = htmlspecialchars($_POST['form-update']);
        $stream = htmlspecialchars($_POST['stream-update']);
        $email = htmlspecialchars($_POST['parent-email-update']);
        $phone_number = htmlspecialchars($_POST['parent-phone-update']);

        if(count($update_student_error) === 0){
            $update_student_query->execute(array($hostel,$form_name, $stream, $email, $phone_number, $_GET['id']));
            $_SESSION['success'] = 'Student records updated successfully';
            header('location: managest.php');
        }else{
            $update_error = 'Error updating student recods, fix below errors';
            array_unshift($update_student_error, $update_error);
        }
    }

    function updateSubject(){
        global $update_subject_error, $update_subject_query;
        
        $type = htmlspecialchars($_POST['type-update']);
        $hos = htmlspecialchars($_POST['hos-update']);

        if(count($update_subject_error) === 0){
            $update_subject_query->execute(array($type, $hos, $_GET['id']));
            $_SESSION['success'] = 'Subject records updated successfully';
            header('location: managesub.php');
        }else{
            $update_error = 'Error updating subject records, fix below errors';
            array_unshift($update_subject_error, $update_error);
        }

    }

    function updateTeacher(){
        global $update_teacher_query, $update_teacher_error;
        $email = htmlspecialchars($_POST['teacher-email-update']);
        $phone = htmlspecialchars($_POST['teacher-num-update']);
        $role = htmlspecialchars($_POST['teacher-role-update']);

        if(count($update_teacher_error) === 0){
            $update_teacher_query->execute(array($email, $phone, $role, $_GET['id']));
            $_SESSION['success'] = 'Teacher records updated successfully';
            header('location: manageteach.php');
        }else{
            $update_error = 'Error updating teacher records, fix below errors';
            array_unshift($update_teacher_error, $update_error);
        }
    }

    function updateStaff(){
        global $update_staff_query, $update_staff_error, $update_role; 

        $email = htmlspecialchars($_POST['staff-email-update']);
        $phone = htmlspecialchars($_POST['staff-phone-update']);
        //$role = htmlspecialchars($_POST['staff-role-update']);
        //$name = htmlspecialchars($_POST['staff-name']);

        if(count($update_staff_error) === 0){
            $update_staff_query->execute(array($email, $phone, $_GET['id']));
            $_SESSION['success'] = 'Staff records updated successfully';
            header('location: managestaff.php');
        }else{
            $update_error = 'Error updating teacher records, fix below errors';
            array_unshift($update_staff_error, $update_error);
        }
    }

    function updateRole(){
        global $update_role, $update_role_error, $update_role2;
        $staff_names = htmlspecialchars($_POST['staff-incharge-update']);
        $role = htmlspecialchars($_POST['role-name']);
        $staff_name = explode(' ', $staff_names);

        if(count($update_role_error) === 0){
            $update_role->execute(array($staff_names, $role));
            $update_role2->execute(array($role, $staff_name[0], $staff_name[1], $staff_name[2]));
            $_SESSION['success'] = 'Role records updated successfully';
            header('location: managerole.php');
        }else{
            $update_error = 'Error updating role records, fix below errors';
            array_unshift($update_role_error, $update_error);
        }
    }

    function updateHostel(){
        global $update_hostel_query, $update_hostel_error;
        $teacher = htmlspecialchars($_POST['teacher-update']);

        if(count($update_hostel_error)===0){
            $update_hostel_query->execute(array($teacher, $_GET['id']));
            $_SESSION['success'] = 'Hostel records updated successfully';
            header('location: managehost.php');
        }else{
            $update_error = 'Error updating hostel records, fix below errors';
            array_unshift($update_hostel_error, $update_error);
        }

    }

    //user settings
    function updateImage(){
        global $update_settings;
        
        $name = $_FILES['admin-photo']['tmp_name'];
        $properties = getimagesize($name);
        $folder = '../images/staffs';
        $ext = pathinfo($_FILES['admin-photo']['name'], PATHINFO_EXTENSION);
        $maxDim = 100;

        list($width, $height, $type, $attr) = getimagesize($name);
        if($width > $maxDim || $height > $maxDim){
            $target_filename = $name;
            $ratio = $width/$height; 
            if($ratio > 1){
                $new_width = $maxDim;
                $new_height = $maxDim;
            }else{
                $new_width = $maxDim;
                $new_height = $maxDim;
            }

            $src = imagecreatefromstring( file_get_contents( $name ) );
            $dst = imagecreatetruecolor( $new_width, $new_height );
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
            imagedestroy( $src );
            imagepng( $dst, $target_filename ); // adjust format as needed
            imagedestroy( $dst );

            move_uploaded_file($target_filename, $folder);
            echo "Success";
        }    
    }

    //helper functions

    function showSuccessMessage(){
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo '<div class="alert alert-success" role="alert">';
                echo $_SESSION['success'];
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>';
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
                    echo '<li class = "">'.$error_msg.'</li>';
                }
            echo '</ul>';
        echo '</div>';
    }

    function displayMenu($query, $column){
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result){
            echo '<option value ="'.$result[$column].'">'.$result[$column].'</option>';
        }
    }

    function buildCard(string $name, $sqlstatement, array $classes, string $link){
        $sqlstatement->execute();
        $results = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);
        echo "<div class = \"card {$classes[0]} {$classes[1]}\">";
            echo "<div class = \"card-body\">
                    <h4>{$name}: {$count}</h5>
                    <h6>Total {$name}</h6>
                </div>
                <div class=\"card-footer\">
                    <a href = \"{$link}\">View</a>
                </div>";
        echo '</div>';
    }

    function buildTable($query, array $columns, array $link, array $action){
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class = \"table table-stripped table-bordered table-sm\">";
            echo "<thead>";
                echo "<tr>";
                    foreach ($columns as $column) {
                        echo "<th scope=col>{$column}</th>";
                    }
                    echo "<th scope=col>Action</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                    foreach ($results as $row) {
                        echo "<tr>";
                            foreach ($columns as $index) {
                                echo "<td>{$row[$index]}</td>";
                            }
                            echo "<td>
                                <div class=\"dropdown\">
                                    <a class=\"btn btn-success btn-sm dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        Manage
                                    </a>
                                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">
                                        <a class=\"dropdown-item text-info\" href=\"{$link[0]}?action={$action[0]}&id={$row['id']}\"><i class=\"fa fa-pencil\"></i> Edit</a>
                                        <a class=\"dropdown-item text-danger\" href=\"{$link[1]}?action={$action[1]}&id={$row['id']}\"><i class=\"fa fa-trash\"></i> Delete</a>
                                    </div>
                                </div>
                            </td>";
                        echo "</tr>";
                    }
            echo "</tbody>";
        echo "</table>";
    }
