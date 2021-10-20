<?php
    require '../shared/home.php';


    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
        $id = $_GET['id'];
        $_SESSION['delete_id'] = $id;
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete student 
                <?php ?> 
            </h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <?php showSuccessMessage()  ?>
                <p class="text-danger">Delete this student ?</p>
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-danger" type="submit" name="delete-yes">Yes</button>
                        <button type="submit" class="btn btn-success" name="delete-no">No</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>