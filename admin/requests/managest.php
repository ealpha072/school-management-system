<?php 
    $form_name = htmlspecialchars($_GET['form_name']);
    $stream_name = htmlspecialchars($_GET['stream_name']);

    $select_this_student = $db->prepare('select adm_num, hostel, first_name, mid_name, last_name 
    from students where form =:form and stream=:stream');

    $select_this_student->execute(array(':form'=>$form_name, ':stream'=>$stream_name));
    $results = $select_this_student->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class="table table-stripped table-bordered">';
    echo '<caption>'.$form_name.' '.$stream_name.'</caption>
        <thead>
            <tr>
                <th scope=col>Adm No</th>
                <th scope=col>Full Name</th>
                <th scope=col>Hostel Name</th>
                <th scope=col colspan=2 class=\"text-center\">Action</th>            
            </tr>
        </thead>
        <tbody>';
            foreach ($results as $row) {
                # code...
                $full_name = $row['first_name'].' '.$row['mid_name'].' '.$row['last_name'];
                echo '<tr>';
                    echo '<td>'.$row['adm_no'].'</td>';
                    echo '<td>'.$full_name.'</td>';
                    echo '<td>'.$row['hostel'].'</td>';
                    echo '<td><a href=" " class="link-primary">Edit<a/></td>';
                    echo '<td><a href=" " class="link-primary">Delete</a></td>';
                echo '</tr>';
            }
        echo '</tbody>'; 
    echo '</table>';
    




?>