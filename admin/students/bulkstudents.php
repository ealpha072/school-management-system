<?php
    require "../shared/home.php";
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <p>Add bulk students</p>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="search file" class="col-sm-2 col-form-label">Upload excell file</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control form-control-sm" name="excell-file" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="class" class="col-sm-2 col-form-label">Class</label>
                            <div class="col-sm-10">
                                <select name="class" id="" class="form-control form-control-sm" required>
                                    <option value="" selected="" disabled="" hidden>Select a class</option>
                                    <?php 
                                        $select_classes->execute();
                                        displayMenu($select_classes, 'name');
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stream" class="col-sm-2 col-form-label">Stream</label>
                            <div class="col-sm-10">
                                <select name="class" id="" class="form-control form-control-sm" required>
                                    <option value="" selected="" disabled="" hidden>Select a stream</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Red">Red</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="button">
                            <button class="btn btn-success btn-small" type="submit"><i class="fa fa-upload fa-sm"></i> Upload and add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>