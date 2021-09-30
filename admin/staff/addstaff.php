<?php require "../shared/home.php"; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add new Support Staff</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <!--personal info card-->
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="first-name">First Name <sup>*</sup></label>
                                <input type="text" placeholder="First Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mid-name">Mid Name <sup>*</sup></label>
                                <input type="text" placeholder="Mid Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Last Name <sup>*</sup></label>
                                <input type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="email">Email <sup>*</sup></label>
                                <input type="text" placeholder="Email" class="form-control">
                            </div>
                            <div class="col">
                                <label for="phone-number">Phone Number <sup>*</sup></label>
                                <input type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="gender">Gender<sup>*</sup></label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected disabled>Choose Gender</option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                            </div>
                            <div class="col">
                                <label for="photo">Photo <sup>*</sup></label>
                                <input type="file" placeholder="Upload photo" class="form-control">
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
                                <label for="">Date Employed</label>
                                <input type="text" class="form-control" disabled value="<?php echo date("Y/m/d")?>" readonly>
                            </div>
                            <div class="col">
                                <label for="role">Role</label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose Role</option>
                                    <option value="">Accountant</option>
                                    <option value="">Caterer</option>
                                    <!--consider more roles-->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>