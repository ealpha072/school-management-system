<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a role</h5>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_role_error) && !empty($add_role_error)){
                        displayErrors($add_role_error);
                    }
                ?>
                <div class="form-group row">

                    <label for="staff-type" class="col-sm-2 col-form-label col-form-label-sm">Staff Type</label>
                    <div class="col-sm-4">
                        <select name="staff-type" id="staff-type" class="form-control form-control-sm" required="">
                            <option value="" selected="" disabled="">--Choose staff type--</option>
                            <option value="Teaching staff">Teaching Staff</option>
                            <option value="Support staff">Support Staff</option>
                        </select>
                    </div>
                    
                    <label for="role-name" class="col-sm-2 col-form-label col-form-label-sm">Role Name</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Name of Role" class="form-control form-control-sm" name="role-name" required="">
                    </div>
                </div>

                <div class="form-group row">

                    <label for="staff-name" class="col-sm-2 col-form-label col-form-label-sm">Staff Incharge</label>    
                    <div class="col-sm-4">
                        <select name="staff-name" id="staff-incharge" class="form-control form-control-sm">
                            <option value="" selected disabled>Select staff</option>
                            
                        </select>
                    </div>
                    
                    <label for="date" class="col-sm-2 col-form-label col-form-label-sm">Date</label>
                    <div class="col-sm-4">
                        <input type="text" readonly value="<?php echo date("Y/m/d"); ?>" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="button">
                    <button class="btn btn-primary btn-sm" name="add-role">+ Add Role</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--
   -->