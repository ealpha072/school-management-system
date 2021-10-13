<?php
    require "../shared/home.php";

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add new Teacher</h5>
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
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="first-name">First Name <sup>*</sup></label>
                                <input type="text" placeholder="First Name" class="form-control" value = "Njiru" required="" name="first-name">
                            </div>
                            <div class="col">
                                <label for="mid-name">Mid Name <sup>*</sup></label>
                                <input type="text" placeholder="Mid Name" class="form-control" value = "Maina" required="" name="mid-name">
                            </div>
                            <div class="col">
                                <label for="">Last Name <sup>*</sup></label>
                                <input type="text" placeholder="Last Name" class="form-control" value="Waithera" required="" name="last-name">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <label for="email">Email <sup>*</sup></label>
                                <input type="text" placeholder="Email" class="form-control" value="ealpha072@gmail.com" required="" name="email">
                            </div>
                            <div class="col">
                                <label for="phone-number">Phone Number <sup>*</sup></label>
                                <input type="text" placeholder="Phone Number" class="form-control" value="0798975799" required="" name="phone-number">
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <label for="gender">Gender<sup>*</sup></label>
                                    <select name="teacher-gender" id="" class="form-control" required="">
                                        <option value="" selected disabled>Choose Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                            </div>
                            <div class="col">
                                <label for="photo">Photo <sup>*</sup></label>
                                <input type="file" placeholder="Upload photo" class="form-control" required="" name="teacher-photo">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END OF CARD-->
                <div class="card">
                    <div class="card-header">
                        <h5>School Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="role">Role</label>
                                <select name="teacher-role" id="" class="form-control" required="">
                                    <option value="" disabled>Choose Role</option>
                                    <!--consider more roles-->
                                    <option value="deputy" selected="">Deputy Teacher</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Date Employed</label>
                                <input type="text" class="form-control" disabled value="<?php echo date("Y/m/d")?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <!--populate subjects using php-->
                            <div class="col">
                                <label for="">Subject 1</label>
                                <input type="text" placeholder="Subject One" class="form-control" value="Mathematics" required="" name="subject-1">
                            </div>
                            <div class="col">
                                <label for="">Subject 2</label>
                                <input type="text" placeholder="Subject Two" class="form-control" value="History" required="" name="subject-2">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="button-div">
                    <button class="btn btn-success" type="submit" name="add-teacher">Add teacher</button>
                </div>
            </form>
        </div>
    </div>
</div>
