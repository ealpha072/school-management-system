<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from subjects where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update subject: <?php echo $results['name']?></h4>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input type="text" name="" id="" readonly class="form-control form-control-sm" value="<?php echo $results['name']?>">
                    </div>
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Subject Type</label>
                    <div class="col-sm-4">
                        <select name="type-update" id="" class="form-control form-control-sm">
                            <option value="<?php echo $results['subject_type']?>" selected><?php echo $results['subject_type']?></option>
                            <option value="Elective">Elective</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">HOS</label>
                    <div class="col-sm-4">
                        <select name="hos-update" id="" class="form-control form-control-sm">
                            <option value="" selected><?php echo $results['head_of_subject']; ?></option>
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

                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Department</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" disabled>
                            <option value="" selected><?php echo $results['department']?></option><!--problem here-->
                        </select>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-dark btn-sm" name="update-subject">Update Subjects</button>
                </div>
            </form>
        </div>
    </di>
</div>