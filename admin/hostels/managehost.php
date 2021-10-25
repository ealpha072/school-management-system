<?php require "../shared/home.php";?>

<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h6>All hostels</h6>
        </div>
        <div class="card-body">
            <?php 
                showSuccessMessage();

                if(isset($update_hostel_error) && !empty($update_hostel_error)){
                    displayErrors($update_hostel_error);
                }

                $select_hostel->execute();
                buildTable($select_hostel, ['id','name','teacher_incharge'], ['updatehost.php','deletehost.php'],['edit_hostel','delete_hostel']);
            ?>
        </div>
    </div>
</div>