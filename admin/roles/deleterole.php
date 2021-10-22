<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete_role'){
        $id = $_GET['id'];
        $_SESSION['delete_id'] = $id;
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete parent </h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <p class="text-danger">Delete this role? This removes all records from the database</p>
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-danger btn-sm" type="submit" name="delete-role">Yes</button>
                        <a href="managerole.php" class="btn btn-success btn-sm">No</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>