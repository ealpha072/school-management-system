<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-wrench fa-sm"></i> Manage my staff</h6> 
        </div>
        <div class="card-body">
            <?php showSuccessMessage(); ?> 
            <div class="card forms">
                <div class="card-header">
                    <h6>Search/Select Staff</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <select name="" id="staff-name" class="form-control">
                                <option value="" selected disabled>--Choose Staff name--</option>
                                <?php 
                                    $select_staff ->execute();
                                    $results = $select_staff->fetchAll(PDO::FETCH_ASSOC);

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
            <div class="card">
                <div class="card-header">
                    <h5>My Staff(Based on Search/Select Value)</h5>
                </div>
                <div class="card-body" id="result-holder">
                    <!--RESULTS FOR TEACHERS QUERRY-->
                </div>
            </div>
        </div>
    </div>
</div>