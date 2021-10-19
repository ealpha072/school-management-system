<?php
    require '../shared/home.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $db->prepare('select * from students where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_COLUMN);
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update student Records</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                
            </form>
        </div>
    </di>
</div>