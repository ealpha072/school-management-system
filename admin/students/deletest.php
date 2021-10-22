<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete_student'){
        $id = $_GET['id'];
        $_SESSION['delete_id'] = $id;
        $query = $db->prepare('select * from students where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['email'] = $results[0]['p_email'];
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete student, Adm num: <?php echo $results[0]['adm_num']; ?> 
            </h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <p class="text-danger">Delete this student ? This deletes both student and related parent info</p>
                <div class="form-group row">
                    <div class="col">
                        <button class="btn btn-danger" type="submit" name="delete-student">Yes</button>
                        <a href="managest.php" class="btn btn-success" name="delete-no">No</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>