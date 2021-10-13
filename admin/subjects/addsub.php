<?php
    require "../shared/home.php";

    $select_teacher = $db->prepare('select first_name, mid_name, last_name from teachers');
    $select_department = $db->prepare('select dpt_name from departments');
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
                    echo showSuccessMessage();

                    if(isset($add_subject_error) && !empty($add_subject_error)){
                        displayErrors($add_subject_error);
                    }
                ?>
                <div class="card subject-info">
                    <div class="card-header">
                        <h5>Subject Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Name of subject" class="form-control" name="subject-name" required="">
                            </div>
                            <div class="col">
                                <label for="teacher">Head of Subject</label>
                                <select name="hos" id="" class="form-control" required="">
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
                        <div class="form-row">
                            <div class="col">
                                <label for="subject-type">Subject type</label>
                                <select name="subject-type" id="" class="form-control" required="">
                                    <option value="" selected disabled>Choose subject type</option>
                                    <option value="compulsory">Complusory</option>
                                    <option value="elective">Elective</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="department">Department</label>
                                <select name="department" id="" class="form-control" required="">
                                    <option value="" selected disabled>Choose Department</option>
                                    <?php
                                        displayMenu($select_department, 'dpt_name');
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="submit-button">
                            <button class="btn btn-primary" name="add-subject" type="submit">Add subject</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
