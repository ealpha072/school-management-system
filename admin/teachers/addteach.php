<?php
    require "../shared/home.php";

    $select_roles = $db->prepare('select role_name from staff_roles where staff_type = :type and staff_name = :name');

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-plus fa-sm"></i> Add new Teacher</h6>
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?> " method="post" enctype = "multipart/form-data">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_teacher_error) && !empty($add_teacher_error)){
                        displayErrors($add_teacher_error);
                    }
                ?>
                <!--personal info card-->
                <div class="card">
                    <div class="card-header">
                        <h6>Personal Info</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="first-name" class="col-sm-2 col-form-label col-form-label-sm">First Name <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="First Name" class="form-control form-control-sm" required="" name="first-name">
                            </div>

                            <label for="mid-name" class="col-sm-2 col-form-label col-form-label-sm">Mid Name <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Mid Name" class="form-control form-control-sm" required="" name="mid-name">
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="" class="col-sm-2 col-form-label col-form-label-sm">Last Name </label>
                            <div class="col-sm-4 ">
                                <input type="text" placeholder="Last Name" class="form-control form-control-sm" name="last-name">
                            </div>

                            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Email" class="form-control form-control-sm" value="" required="" name="email">
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="phone-number" class="col-sm-2 col-form-label col-form-label-sm">Phone Number <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="tel" placeholder="Phone Number(+2547XXXXXXXX)" class="form-control form-control-sm" value="" required="" name="phone-number">
                                <small id="emailHelp" class="form-text text-muted">Phone number must be 13 digits (+2547XXXXXXXX)</small>
                            </div>

                            <label for="gender" class="col-sm-2 col-form-label col-form-label-sm">Gender<sup>*</sup></label>
                            <div class="col-sm-4">
                                <select name="teacher-gender" id="" class="form-control form-control-sm" required="">
                                    <option value="" selected disabled>Choose Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
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

                            <label for="role" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                            <div class="col-sm-4">
                                <select name="teacher-role" id="" class="form-control form-control-sm" required="">
                                    <option value="" disabled selected="">Choose Role</option>
                                    <option value="No role">No role</option>
                                    <?php
                                        $select_roles->execute(array(':type'=>'Teaching Staff', ':name'=>'Unassigned'));
                                        displayMenu($select_roles, 'role_name');
                                    ?>
                                </select>
                            </div>

                            <label for="" class="col-sm-2 col-form-label col-form-label-sm">Date Employed</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control form-control-sm" disabled value="<?php echo date("Y/m/d")?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="subject_1" class="col-sm-2 col-form-label col-form-label-sm">Subject 1</label>
                            <div class="col-sm-4">
                                <select name="subject-1" id="" required="" class="form-control form-control-sm">
                                    <option value="" selected="" disabled="">--Choose first subject--</option>
                                    <?php
                                        $select_subjects->execute();
                                        displayMenu($select_subjects, 'name');
                                    ?>
                                </select>
                            </div>

                            <label for="subject-2" class="col-sm-2 col-form-label col-form-label-sm">Subject 2</label>
                            <div class="col-sm-4">
                                <select name="subject-2" id="" required="" class="form-control form-control-sm">
                                    <option value="" selected="" disabled="">--Choose second subject--</option>
                                    <?php
                                        $select_subjects->execute();
                                        displayMenu($select_subjects, 'name');
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="button-div">
                    <button class="btn btn-success btn-sm" type="submit" name="add-teacher"><i class="fa fa-plus fa-sm"></i>Add teacher</button>
                </div>
            </form>
        </div>
    </div>
</div>