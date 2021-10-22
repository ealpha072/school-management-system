<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage Roles</h5>
        </div>
        <div class="card-body">
            <?php showSuccessMessage(); ?>
            <div class="form-row">
                <div class="col">
                    <select name="" id="role-find" class="form-control">
                        <option value="" selected disabled>Role to manage</option>
                        <?php 
                            $select_role->execute();
                            displayMenu($select_role, 'role_name');
                        ?>
                    </select>
                </div>
                
            </div>
            <hr>
            <div class="card results-holder">
                <div class="card-header">
                    <h5>Results</h5>
                </div>
                <div class="card-body" id="result-holder">
                <!--------------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>

