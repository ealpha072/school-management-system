<?php require "../shared/home.php"?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add New Subject</h5>
        </div>
        <div class="card-body">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <?php echo showSuccessMessage(); ?>
                <div class="card subject-info">
                    <div class="card-header">
                        <h5>Subject Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Name of subject" class="form-control" name="subject-name" required="">
                            </div>
                            <div class="col">
                                <label for="teacher">Head of Subject</label>
                                <select name="hos" id="" class="form-control" required="">
                                    <option value="" disabled>--Head of subject--</option>
                                    <!--populate this with the teachers-->
                                    <option value="Mr Njiru" selected="">Mr Njiru</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="subject-type">Subject type</label>
                                <select name="subject-type" id="" class="form-control" required="">
                                    <option value="" selected disabled>Choose subject type</option>
                                    <option value="compulsory">Complusory</option>
                                    <option value="elective">Elective</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="department">Department</label>
                                <select name="department" id="" class="form-control" required="">
                                    <option value="" selected disabled>Choose Department</option>
                                    <!--consider adding this-->
                                    <option value="Chemistry">Chemistry</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="submit-button">
                            <button class="btn btn-primary" name="add-subject" type="submit">Add subject</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
