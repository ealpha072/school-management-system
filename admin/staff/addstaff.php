<?php
    require "../shared/home.php";
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add new Support Staff</h5>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_staff_error) && !empty($add_staff_error)){
                        displayErrors($add_staff_error);
                    }
                ?>
                <!--personal info card-->
                <div class="card">
                    <div class="card-header">
                        <h6>Personal Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="first-name" class="col-sm-2 col-form-label col-form-label-sm">First Name <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="First Name" class="form-control form-control-sm" name="first-name" required="">
                            </div>

                            <label for="mid-name" class="col-sm-2 col-form-label col-form-label-sm">Mid Name <sup>*</sup></label>
                            <div class="col">
                                <input type="text" placeholder="Mid Name" class="form-control form-control-sm" name="mid-name" required="">
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="" class="col-sm-2 col-form-label col-form-label-sm">Last Name <sup>*</sup></label>
                            <div class="col">
                                <input type="text" placeholder="Last Name" class="form-control form-control-sm" name="last-name" required="">
                            </div>

                            <label for="gender" class="col-sm-2 col-form-label col-form-label-sm">Gender<sup>*</sup></label>
                            <div class="col-sm-4">
                                <select name="gender" id="" class="form-control form-control-sm" required="">
                                    <option value="" selected disabled>Choose Gender</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="email" placeholder="Email" class="form-control form-control-sm" name="email" required="">
                            </div>

                            <label for="phone-number" class="col-sm-2 col-form-label col-form-label-sm">Phone Number <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="number" placeholder="Phone Number" class="form-control form-control-sm" name="phone-number" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END OF CARD-->
                <div class="card">
                    <div class="card-header">
                        <h6>School Info</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="" class="col-sm-2 col-form-label col-form-label-sm">Date Employed</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" disabled value="<?php echo date("Y/m/d")?>" readonly>
                            </div>

                            <label for="role" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                            <div class="col">
                                <select name="staff-role" id="" class="form-control form-control-sm" required>
                                    <option value="" selected disabled>Choose Role</option>
                                    <option value="No role">No role</option>
                                    <?php
                                        $select_roles->execute(array(':type'=>'Support staff', ':name'=>'Leave Unassigned'));
                                        displayMenu($select_roles, 'role_name');
                                    ?>
                                    <!--consider more roles-->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="button">
                    <button class="btn btn-success btn-sm" type="submit" name="add-staff">+ Add new staff</button>
                </div>
            </form>
        </div>
    </div>
</div>
