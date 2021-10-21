<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from hostels where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Update hostel</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="" class = "col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $results['name']?>" readonly>
                    </div>

                    <label for="" class = "col-sm-2 col-form-label col-form-label-sm">Teacher</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="" selected><?php echo $results['teacher_incharge']?></option>
                            <?php 
                                $select_teacher->execute();
                                $teacher_results = $select_teacher->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($teacher_results as $result) {
                                    $full_name = $result['first_name'].' '.$result['mid_name'].' '.$result['last_name'];
                                    echo '<option value = "'.$full_name.'">'.$full_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>