<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
        $id = $_GET['id'];
        
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete subject </h5>
        </div>
        <div class="card-body">
            <h5 class="text-danger">You cannot delete a subject!!</h5>
        </div>
    </div>
</div>