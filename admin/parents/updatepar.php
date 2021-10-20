<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit'){
        $id = $_GET['id'];
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update parent Records</h4>
        </div>
        <div class="card-body">
            <h5 class="text-danger">To edit parent details, go to manage student page <a href="../students/managest.php" class="text-info">here</a> </h5>
        </div>
    </di>
</div>