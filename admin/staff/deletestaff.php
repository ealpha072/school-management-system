<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
        $id = $_GET['id'];
        $_SESSION['delete_id'] = $id;
        $query = $db->prepare('select * from support_staff where id=:id');
        $query->execute(array(':id'=>$id));
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete staff</h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <p class="text-danger">Delete this staff? This removes all records from the database</p>
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-danger" type="submit" name="delete-staff-yes">Yes</button>
                        <a href="manageteach.php" class="btn btn-success" name="delete-staff-no">No</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>