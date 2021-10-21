<?php require "../shared/home.php";?>

<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h6>All hostels</h6>
        </div>
        <div class="card-body">
            
            <?php 
                showSuccessMessage();
                $select_hostel->execute();
                buildTable($select_hostel, ['id','name','teacher_incharge'], ['updatehost.php','deletehost.php'],['edit','delete']);
            ?>
        </div>
    </div>
</div>