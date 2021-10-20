<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from students where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Delete: Adm no <?php echo $results['adm_num']?></h5>
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>