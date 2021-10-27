<?php
    require "../shared/home.php";
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-cogs"></i> Settings</h6>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h6>System settings</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">System Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="School Management System" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="BOX 232323-NAIROBI" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="English" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">System Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control form-control-sm" value="ealpha072@gmail.com" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" style="margin-top: 10px; margin-bottom:10px">
                <div class="card-header">
                    <h6>School Settings</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="OSIRI MIXED SECONDARY SCHOOL" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" value="osirimixed@gmail.com" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control form-control-sm" value="254798579799" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Vision</label>
                        <div class="col-sm-9">
                            <textarea name="" id="" rows="" cols="" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label col-form-label-sm">Mission</label>
                        <div class="col-sm-9">
                            <textarea name="" id="" cols="" rows="" class="form-control form-control-sm"></textarea>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">School settings</h6>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">School email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control-sm" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control form-control-sm" value="" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Vision</label>
                                            <div class="col-sm-9">
                                                <textarea name="" id="" cols="" rows="" class="form-control form-control-sm" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Mission</label>
                                            <div class="col-sm-9">
                                                <textarea name="" id="" cols="" rows="" class="form-control form-control-sm" required></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success btn-sm" name="edit-settings">Save</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end of modal-->
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row card">
                <div class="card-header">
                    <h6>Change Image</h6>
                </div>
                <div class="card-body">
                    <form action="../shared/imgresize.php" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control form-control-sm" name="admin-photo" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-sm" name="upload-image">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>