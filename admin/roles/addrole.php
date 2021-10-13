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
                <div class="form-row">
                    <div class="col">
                        <label for="staff-type">Staff Type(Type of staff Doing the role)</label>
                        <select name="staff-type" id="" class="form-control" required="">
                            <option value="" selected="" disabled="">--Choose staff type--</option>
                            <option value="Teaching staff">Teaching Staff</option>
                            <option value="Support staff">Non Teaching Staff</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="role-name">Role Name</label>
                        <input type="text" placeholder="Name of Role" class="form-control" name="role-name" required="">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col">
                        <label for="staff-name">Staff Incharge</label>
                        <select name="staff-name" id="" class="form-control">
                            <option value="" selected disabled>Choose Name of Staff Incharge</option>
                            <option value="Dont asign">Dont asign</option>
                            <option value="Mr Njiru">Mr Njiru</option>
                            <!--php population-->
                        </select>
                    </div>
                    <div class="col">
                        <label for="date">Date of assigning role</label>
                        <input type="text" readonly value="<?php echo date("Y/m/d"); ?>" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="button">
                    <button class="btn btn-primary" name="add-role">Add Role</button><!--button spacing consider correcting-->
                </div>
            </form>
        </div>
    </div>
</div>
