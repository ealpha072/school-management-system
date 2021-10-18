
<?php if(isset($_GET['form_name']) && isset($_GET['stream_name'])){
        //set variables
        $form_name = htmlspecialchars($_GET['form_name']);
        $stream_name = htmlspecialchars($_GET['stream_name']);

        //query and execute
        $select_this_student = $db->prepare('select adm_num, hostel, first_name, mid_name, last_name
        from students where form =:form and stream=:stream');

        $select_this_student->execute(array(':form'=>$form_name, ':stream'=>$stream_name));

        //call funtion
        displayTable($select_this_student, []);
    }

    if(isset($_GET['admnum'])){
        $adm = htmlspecialchars($_GET['admnum']);
        $select_this_adm = $db->prepare('select * from students where adm_num=:num');
        $select_this_adm->execute(array(':num'=>$adm));
        displayTable($select_this_adm);
    }

    if(isset($_GET['to_find_subj'])){
        $subject = htmlspecialchars($_GET['to_find_subj']);
        $select_this_sub = $db->prepare('select * from subjects where name=:name');
        $select_this_sub->execute(array(':name'=>$subject));
        $results = $select_this_sub->fetchAll(PDO::FETCH_ASSOC);

        echo '<table class="table table-stripped table-bordered">';
        echo '<thead>
                <tr>
                    <th scope=col>Serial No</th>
                    <th scope=col>Name</th>
                    <th scope=col>Type</th>
                    <th scope=col>HOS</th>
                    <th scope=col>Department</th>
                    <th scope=col>Action</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($results as $row) {
                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'.$row['subject_type'].'</td>';
                        echo '<td>'.$row['head_of_subject'].'</td>';
                        echo '<td>'.$row['department'].'</td>';
                        echo '<td><a href="" class="link-primary">Edit<a/></td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }

    if(isset($_GET['name_1']) && isset($_GET['name_2']) && isset($_GET['name_3'])){

        $fname =htmlspecialchars($_GET['name_1']);
        $select_this_teacher = $db->prepare('select * from teachers where first_name=:fname');
        $select_this_teacher->execute(array(':fname'=> $fname));
        $results = $select_this_teacher->fetchAll(PDO::FETCH_ASSOC);

        echo '<table class="table table-stripped table-bordered">';
        echo '<thead>
                <tr>
                    <th scope=col>Serial No</th>
                    <th scope=col>Name</th>
                    <th scope=col>Role</th>
                    <th scope=col>Subject 1</th>
                    <th scope=col>Sebject 2</th>
                    <th scope=col>Email</th>
                    <th scope=col>Action</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($results as $row) {
                    $full_name = $row['first_name'].' '.$row['mid_name'].' '.$row['last_name'];
                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$full_name.'</td>';
                        echo '<td>'.$row['role'].'</td>';
                        echo '<td>'.$row['subject_1'].'</td>';
                        echo '<td>'.$row['subject_2'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td><a href="" class="link-primary">Edit<a/></td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }

    if (isset($_GET['form_name_parent']) && isset($_GET['stream_name_parent'])) {
        $form = htmlspecialchars($_GET['form_name_parent']);
        $stream = htmlspecialchars($_GET['stream_name_parent']);

        $select_this_parent = $db->prepare('select id, parent_name, p_phone_number, 
        p_email from students where form=:form and stream=:stream ');
        $select_this_parent->execute(array(':form'=>$form, ':stream'=>$stream));
        $results = $select_this_parent->fetchAll(PDO::FETCH_ASSOC);

        echo '<table class="table table-stripped table-bordered">';
        echo '<thead>
                <tr>
                    <th scope=col>Serial No</th>
                    <th scope=col>Name</th>
                    <th scope=col>Phone num</th>
                    <th scope=col>Eamil</th>
                    <th scope=col>Action</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($results as $row) {
                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['parent_name'].'</td>';
                        echo '<td>'.$row['p_phone_number'].'</td>';
                        echo '<td>'.$row['p_email'].'</td>';
                        echo '<td><a href="" class="link-primary">Edit<a/></td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }

    if(isset($_GET['staff_fname']) && isset($_GET['staff_mname']) && isset($_GET['staff_lname'])){
        $first_name = htmlspecialchars($_GET['staff_fname']);
        $mid_name = htmlspecialchars($_GET['staff_mname']);
        $last_name = htmlspecialchars($_GET['staff_lname']);   

        $select_this_staff = $db->prepare('select * from support_staff where first_name=:name1 and mid_name=:name2');
        $select_this_staff->execute(array(':name1'=>$first_name, ':name2'=>$mid_name));
        $results = $select_this_staff->fetchAll(PDO::FETCH_ASSOC);

        echo '<table class="table table-stripped table-bordered">';
        echo '<thead>
                <tr>
                    <th scope=col>Serial No</th>
                    <th scope=col>Full Name</th>
                    <th scope=col>Phone num</th>
                    <th scope=col>Role</th>
                    <th scope=col>Email</th>
                    <th scope=col>Action</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($results as $row) {
                    $full_name = $row['first_name'].' '.$row['mid_name'].' '.$row['last_name'];
                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$full_name.'</td>';
                        echo '<td>'.$row['phone_number'].'</td>';
                        echo '<td>'.$row['role'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td><a href="" class="link-primary">Edit<a/></td>';
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';

    }
?>