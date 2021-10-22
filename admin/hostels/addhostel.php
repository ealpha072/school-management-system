<?php
    require "../shared/home.php";

    $select_teacher = $db->prepare('select first_name, mid_name, last_name from teachers');
    $select_teacher->execute();
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a hostel</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_hostel_error) && !empty($add_hostel_error)){
                        displayErrors($add_hostel_error);
                    }
                ?>
                <div class="form-group row">

                    <label for="role-name" class="col-sm-1 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Name of Hostel" class="form-control form-control-sm" name="name">
                    </div>

                    <label for="role-name" class="col-sm-1 col-form-label col-form-label-sm">Teacher</label>
                    <div class="col-sm-3">
                        <select name="teacher" id="" class="form-control form-control-sm">
                            <option value="" selected disabled>Teacher Incharge</option>
                            <?php
                                $results = $select_teacher->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $result) {
                                    $full_name = $result['first_name'].' '.$result['mid_name'].' '.$result['last_name'];
                                    echo '<option value = "'.$full_name.'">'.$full_name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                    <label for="date" class="col-sm-1 col-form-label col-form-label-sm">Date</label>
                    <div class="col-sm-3">
                        <input type="text" readonly value="<?php echo date("Y/m/d"); ?>" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="button">
                    <button class="btn btn-primary btn-sm" type="submit" name="add-hostel">Add Hostel</button>
                </div>

            </form>
        </div>
    </div>
</div>
