<?php
    if(isset($_GET['form_name']) && isset($_GET['stream_name'])){
        //set variables
        $form_name = htmlspecialchars($_GET['form_name']);
        $stream_name = htmlspecialchars($_GET['stream_name']);

        //query and execute
        $select_this_student = $db->prepare('select id, stream, adm_num, hostel, first_name, mid_name, last_name
        from students where form =:form and stream=:stream');

        $select_this_student->execute(array(':form'=>$form_name, ':stream'=>$stream_name));
        buildTable($select_this_student, 
        ['id','adm_num','first_name','mid_name', 'last_name','hostel', 'stream'], 
        ['updatest.php','deletest.php'], 
        ['edit_student','delete_student']);
    }

    if(isset($_GET['admnum'])){
        $adm = htmlspecialchars($_GET['admnum']);
        $select_this_adm = $db->prepare('select * from students where adm_num=:num');
        $select_this_adm->execute(array(':num'=>$adm));
        buildTable($select_this_adm, ['id','adm_num','first_name','mid_name', 'last_name','hostel', 'stream'], 
        ['updatest.php','deletest.php'], ['edit','delete']);
    }

    if(isset($_GET['to_find_subj'])){
        $subject = htmlspecialchars($_GET['to_find_subj']);
        $select_this_sub = $db->prepare('select * from subjects where name=:name');
        $select_this_sub->execute(array(':name'=>$subject));

        buildTable($select_this_sub, ['id', 'name', 'subject_type', 'head_of_subject', 'department'], 
        ['updatesub.php','deletesub.php'], ['edit','delete']);
    }

    if(isset($_GET['name_1']) && isset($_GET['name_2']) && isset($_GET['name_3'])){
        $fname =htmlspecialchars($_GET['name_1']);
        $select_this_teacher = $db->prepare('select * from teachers where first_name=:fname');
        $select_this_teacher->execute(array(':fname'=> $fname));
        buildTable($select_this_teacher, 
        ['id', 'first_name', 'mid_name', 'last_name','role', 'subject_1', 'subject_2'], 
        ['updateteach.php','deleteteach.php'], ['edit_teacher','delete_teacher']);
    }

    if (isset($_GET['form_name_parent']) && isset($_GET['stream_name_parent'])) {
        $form = htmlspecialchars($_GET['form_name_parent']);
        $stream = htmlspecialchars($_GET['stream_name_parent']);

        $select_this_parent = $db->prepare('select id, parent_name, p_phone_number, 
        p_email from students where form=:form and stream=:stream ');
        $select_this_parent->execute(array(':form'=>$form, ':stream'=>$stream));
        buildTable($select_this_parent, ['id', 'parent_name', 'p_phone_number', 'p_email'], 
        ['updatepar.php','deletepar.php'], ['edit_parent','delete_parent']);
    }

    if(isset($_GET['staff_fname']) && isset($_GET['staff_mname']) && isset($_GET['staff_lname'])){
        $first_name = htmlspecialchars($_GET['staff_fname']);
        $mid_name = htmlspecialchars($_GET['staff_mname']);
        $last_name = htmlspecialchars($_GET['staff_lname']);   

        $select_this_staff = $db->prepare('select * from support_staff where first_name=:name1 and mid_name=:name2');
        $select_this_staff->execute(array(':name1'=>$first_name, ':name2'=>$mid_name));
        buildTable($select_this_staff, ['id', 'first_name', 'mid_name', 'last_name', 'phone_number', 'role', 'email'], 
        ['updatestaff.php', 'deletestaff.php'], ['edit_staff','delete_staff']);
    }

    if(isset($_GET['to_find_role'])){
        $role = $_GET['to_find_role'];

        $select_this_role = $db->prepare('select * from staff_roles where role_name=:name');
        $select_this_role->execute(array(':name'=>$role));
        buildTable($select_this_role, ['id', 'role_name', 'staff_type', 'staff_name'], ['updaterole.php','deleterole.php'], 
        ['edit_role','delete_role']);
    }

    if(isset($_GET['staff_type'])){
        $staff_type = strtolower($_GET['staff_type']);
        if($staff_type === 'teaching staff'){
            $select_teacher->execute();
            $results = $select_teacher->fetchAll(PDO::FETCH_ASSOC);
            echo "<option value=\"\" selected disabled hidden>--Select staff--</option>";
            echo "<option value=\"Leave Unassigned\">Leave Unassigned</option>";
            foreach ($results as $result) {
                $full_name = $result['first_name'].' '.$result['mid_name'].' '.$result['last_name'];
                echo '<option value = "'.$full_name.'">'.$full_name.'</option>';
            }
        }elseif ($staff_type === 'support staff') {
            $select_support_staff->execute();
            $results = $select_support_staff->fetchAll(PDO::FETCH_ASSOC);
            echo "<option value=\"\" selected disabled hidden>--Select staff--</option>";
            echo "<option value=\"Leave Unassigned\">Leave Unassigned</option>";
            foreach ($results as $result) {
                $full_name = $result['first_name'].' '.$result['mid_name'].' '.$result['last_name'];
                echo '<option value = "'.$full_name.'">'.$full_name.'</option>';
            }
        }
    }

?>