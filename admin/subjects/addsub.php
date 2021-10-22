<?php
    require "../shared/home.php";
    $select_teacher->execute();
    $select_department->execute();
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add New Subject</h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <?php
                    showSuccessMessage();

                    if(isset($add_subject_error) && !empty($add_subject_error)){
                        displayErrors($add_subject_error);
                    }
                ?>
                <div class="card subject-info">
                    <div class="card-header">
                        <h5>Subject Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Name of subject" class="form-control form-control-sm" name="subject-name" required="">
                            </div>

                            <label for="teacher" class="col-sm-2 col-form-label col-form-label-sm">Head of Subject</label>
                            <div class="col-sm-4">
                                <select name="hos" id="" class="form-control form-control-sm" required="">
                                    <option value="" disabled selected="">--Head of subject--</option>
                                    <?php
                                        $results = $select_teacher->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($results as $result) {
                                            // code...
                                            $full_name = $result['first_name'].' '.$result['mid_name'].' '.$result['last_name'];
                                            echo '<option value = "'.$full_name.'">'.$full_name.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="subject-type" class="col-sm-2 col-form-label col-form-label-sm">Subject type</label>
                            <div class="col-sm-4">
                                <select name="subject-type" id="" class="form-control form-control-sm" required="">
                                    <option value="" selected disabled>Choose subject type</option>
                                    <option value="compulsory">Complusory</option>
                                    <option value="elective">Elective</option>
                                </select>
                            </div>
                            
                            <label for="department" class="col-sm-2 col-form-label col-form-label-sm">Department</label>
                            <div class="col-sm-4">
                                <select name="department" id="" class="form-control form-control-sm" required="">
                                    <option value="" selected disabled>Choose Department</option>
                                    <?php displayMenu($select_department, 'dpt_name'); ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="submit-button">
                            <button class="btn btn-primary btn-sm" name="add-subject" type="submit">+Add subject</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
