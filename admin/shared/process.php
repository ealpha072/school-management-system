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
    $add_teacher_error = [];
    $add_staff_error = [];
    $add_hostel_error = [];
    $add_role_error = [];
    $add_stream_error = [];

    //SQL STATEMENTS -- Below queries have been utilised by the functions in this page
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

    $select_all_students_sql = $db->prepare('select adm_num, stream from students where adm_num=:adm and stream=:stream');

    $add_parent_sql = $db->prepare('insert into parents(parent_name, phone_number, email, childs_name)
        values(:parent_name, :phone_number, :email, :childs_name)');
    $select_all_parents_sql = $db->prepare('select email from parents where email = :email');

        //subject sql statements;
    $add_subject_sql = $db->prepare('insert into subjects(name, subject_type, head_of_subject, department)
        values(:name, :subject_type, :head_of_subject, :department)');

    $select_all_subjects_sql = $db->prepare('select name from subjects where name=:name');

    $add_teacher_sql = $db->prepare('insert into
        teachers (
            first_name, mid_name, last_name,
            gender,
            email,
            phone_number,
            photo,
            role, subject_1, subject_2)
        values(
            :first_name, :mid_name, :last_name,
            :gender,
            :email,
            :phone_number,
            :photo,
            :role, :subject_1, :subject_2

        )');

    $select_teacher_sql = $db->prepare('select email from teachers where email=:email');

    $add_staff_sql = $db->prepare('insert into support_staff (
            first_name,
            mid_name,
            last_name,
            email,
            phone_number,
            role,
            date_employed,
            photo,
            gender)
        values(
            :first_name,
            :mid_name,
            :last_name,
            :email,
            :phone_number,
            :role,
            :date_employed,
            :photo,
            :gender
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

    //BUTTON PUSHES
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

    //ajax queries handling
    if(isset($_GET['form_name']) && isset($_GET['stream_name'])){
        //set variables
        $form_name = htmlspecialchars($_GET['form_name']);
        $stream_name = htmlspecialchars($_GET['stream_name']);

        //query and execute
        $select_this_student = $db->prepare('select id, stream, adm_num, hostel, first_name, mid_name, last_name
        from students where form =:form and stream=:stream');

        $select_this_student->execute(array(':form'=>$form_name, ':stream'=>$stream_name));
        buildTable($select_this_student, ['id','adm_num','first_name','mid_name', 'last_name','hostel', 'stream']);
    }

    if(isset($_GET['admnum'])){
        $adm = htmlspecialchars($_GET['admnum']);
        $select_this_adm = $db->prepare('select * from students where adm_num=:num');
        $select_this_adm->execute(array(':num'=>$adm));
        buildTable($select_this_adm, ['id','adm_num','first_name','mid_name', 'last_name','hostel', 'stream']);
    }

    if(isset($_GET['to_find_subj'])){
        $subject = htmlspecialchars($_GET['to_find_subj']);
        $select_this_sub = $db->prepare('select * from subjects where name=:name');
        $select_this_sub->execute(array(':name'=>$subject));

        buildTable($select_this_sub, ['id', 'name', 'subject_type', 'head_of_subject', 'department']);
    }

    if(isset($_GET['name_1']) && isset($_GET['name_2']) && isset($_GET['name_3'])){
        $fname =htmlspecialchars($_GET['name_1']);
        $select_this_teacher = $db->prepare('select * from teachers where first_name=:fname');
        $select_this_teacher->execute(array(':fname'=> $fname));
        buildTable($select_this_teacher, ['id', 'first_name', 'mid_name', 'last_name','role', 'subject_1', 'subject_2','email']);
    }

    if (isset($_GET['form_name_parent']) && isset($_GET['stream_name_parent'])) {
        $form = htmlspecialchars($_GET['form_name_parent']);
        $stream = htmlspecialchars($_GET['stream_name_parent']);

        $select_this_parent = $db->prepare('select id, parent_name, p_phone_number, 
        p_email from students where form=:form and stream=:stream ');
        $select_this_parent->execute(array(':form'=>$form, ':stream'=>$stream));
        buildTable($select_this_parent, ['id', 'parent_name', 'p_phone_number', 'p_email']);
    }

    if(isset($_GET['staff_fname']) && isset($_GET['staff_mname']) && isset($_GET['staff_lname'])){
        $first_name = htmlspecialchars($_GET['staff_fname']);
        $mid_name = htmlspecialchars($_GET['staff_mname']);
        $last_name = htmlspecialchars($_GET['staff_lname']);   

        $select_this_staff = $db->prepare('select * from support_staff where first_name=:name1 and mid_name=:name2');
        $select_this_staff->execute(array(':name1'=>$first_name, ':name2'=>$mid_name));
        buildTable($select_this_staff, ['id', 'first_name', 'mid_name', 'last_name', 'phone_number', 'role', 'email']);
    }

    if(isset($_GET['to_find_role'])){
        $role = $_GET['to_find_role'];

        $select_this_role = $db->prepare('select * from staff_roles where role_name=:name');
        $select_this_role->execute(array(':name'=>$name));
        buildTable($select_this_role, ['id', 'role_name', 'staff_type', 'staff_name']);
    }

    //..........MAIN FUCTIONS HERE.........................//
    //....................................................//
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
            $email_exists_error = "Parents email is already taken";
            array_push($add_student_error, $email_exists_error);
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
            $image_type_error = "Invalid image extension, please choose a valid format.";
            array_push($add_student_error, $image_type_error);
        }

        if($_FILES['student-photo']['size'] > 5000000){
            $image_size_error = "The image size is too large";
            array_push($add_student_error, $image_size_error);
        }

        //add new student and parent to database
        if(count($add_student_error) == 0){
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

            $add_parent_sql->execute(array(
                ':parent_name'=>$parent_name,
                ':phone_number'=>$pphone_number,
                ':email'=>$pemail,
                ':childs_name'=>$first_name.' '.$mid_name.' '. $last_name
            ));

            $_SESSION['success'] = "New student admission number ".$adm_number." added to database";
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
        $photo = $_FILES['teacher-photo']['name'];
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

        //IMAGE PROCESSING
        $target_dir = "../images/teachers/";
        $target_file_path = $target_dir.basename($_FILES['teacher-photo']['name']);
        $extension = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));

        if(file_exists($target_file_path)){
            $file_exist_error = "Photo already exists.";
            array_push($add_teacher_error, $file_exist_error);
        }

        if(!in_array($extension, ['jpg','png'])){
            $image_type_error = "Invalid image extension, please choose a valid format.";
            array_push($add_teacher_error, $image_type_error);
        }

        if($_FILES['teacher-photo']['size'] > 5000000){
            $image_size_error = "The image size is too large";
            array_push($add_teacher_error, $image_size_error);
        }

        if(count($add_teacher_error) == 0){
            move_uploaded_file($_FILES['teacher-photo']['tmp_name'], $target_file_path);

            $add_teacher_sql->execute(array(
                ':first_name'=> $first_name ,
                ':mid_name'=> $mid_name ,
                ':last_name'=> $last_name,
                ':gender'=> $gender,
                ':email'=> $email,
                ':phone_number'=> $phone_number,
                ':photo'=> $photo,
                ':role'=> $role,
                ':subject_1'=> $subject_1,
                ':subject_2'=> $subject_2
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
        $photo = $_FILES['staff-photo']['name'];
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

        //photo processing
        $target_dir = "../images/staffs/";
        $target_file_path = $target_dir.basename($_FILES['staff-photo']['name']);
        $extension = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));

        if(file_exists($target_file_path)){
            $file_exist_error = "Photo already exists.";
            array_push($add_staff_error, $file_exist_error);
        }

        if(!in_array($extension, ['jpg','png'])){
            $image_type_error = "Invalid image extension, please choose a valid format.";
            array_push($add_staff_error, $image_type_error);
        }

        if($_FILES['staff-photo']['size'] > 5000000){
            $image_size_error = "The image size is too large";
            array_push($add_staff_error, $image_size_error);
        }

        //push to database
        if(count($add_staff_error) == 0){
            move_uploaded_file($_FILES['staff-photo']['tmp_name'], $target_file_path);

            $add_staff_sql->execute(array(
                ':first_name'=>$first_name,
                ':mid_name'=>$mid_name,
                ':last_name'=>$last_name,
                ':email'=>$email,
                ':phone_number'=>$phone_number,
                ':role'=>$role,
                ':date_employed'=>$date,
                ':photo'=>$photo,
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

    function buildCard(string $name, $sqlstatement, array $classes){
        $sqlstatement->execute();
        $results = $sqlstatement->fetchAll(PDO::FETCH_ASSOC);
        $count = count($results);
        echo "<div class = \"card {$classes[0]} {$classes[1]}\">";
            echo "<div class = \"card-body\">
                    <h4>{$name}: {$count}</h5>
                    <h6>Total {$name}</h6>
                </div>
                <div class=\"card-footer\">
                    <a href = \"\">View</a>
                </div>";
        echo '</div>';
    }

    function buildTable($query, array $columns){
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<table class = \"table table-stripped table-bordered\">";
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
                                    <a class=\"btn btn-success dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        Manage
                                    </a>
                                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">
                                        <a class=\"dropdown-item text-info\" href=\"#\">Edit</a>
                                        <a class=\"dropdown-item text-danger\" href=\"#\">Delete</a>
                                    </div>
                                </div>
                            </td>";
                        echo "</tr>";
                    }
            echo "</tbody>";
        echo "</table>";
    }