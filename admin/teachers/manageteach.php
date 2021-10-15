<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage my Teachers</h5>
        </div>
        <div class="card-body">
            <div class="card forms">
                <div class="card-header">
                    <h5>Search/Select Teacher</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <select name="" id="to-find-teacher" class="form-control">
                                <option value="" selected disabled>Choose Teacher</option>
                                <?php
                                    $select_teacher->execute();
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
                </div>
            </div>
            <hr>
            <div class="card results">
                <div class="card-header">
                    <h5>My Teachers(Based on Search/Select Value)</h5>
                </div>
                <div class="card-body" id="result-holder">
                    <!--RESULTS FOR TEACHERS QUERRY-->
                </div>
            </div>
        </div>
    </div>
</div>
