<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete_teacher'){
        $id = $_GET['id'];
        $_SESSION['delete_tid'] = $id;
        $query = $db->prepare('select * from teachers where id=:id');
        $query->execute(array(':id'=>$id));
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete teacher</h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <p class="text-danger">Delete this teacher? This removes all records from the database</p>
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-danger btn-sm" type="submit" name="delete-teacher">Yes</button>
                        <a href="manageteach.php" class="btn btn-success  btn-sm">No</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>