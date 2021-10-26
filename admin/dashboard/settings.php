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
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">School Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="Alpha School of Law" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" value="English" readonly>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row card">
                <div class="card-header">
                    <h6>Update Logo</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label col-form-label-sm">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control form-control-sm" >
                            </div>
                        </div>
                        <div class="buttons">
                            <button type="submit" class="btn btn-sm btn-dark">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>