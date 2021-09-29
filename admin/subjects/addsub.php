<?php require "../shared/home.php"?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Add New Subject</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="card subject-info">
                    <div class="card-header">
                        <h5>Subject Info</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" placeholder="Name of subject" class="form-control">
                            </div>
                            <div class="col">
                                <label for="teacher">Teacher Assigned</label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose a teacher</option>
                                    <!--populate this with the teachers-->
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="subject-type">Subject type</label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose subject type</option>
                                    <option value="">Complusory</option>
                                    <option value="">Elective</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="department">Department</label>
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose Department</option>
                                    <!--consider adding this-->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>