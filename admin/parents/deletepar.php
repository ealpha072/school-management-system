<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete_parent'){
        $id = $_GET['id'];
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete parent </h5>
        </div>
        <div class="card-body">
            <h5 class="text-danger">To delete parent, go to manage student <a href="../students/managest.php" class="text-info">here</a> </h5>
        </div>
    </div>
</div>