<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage my staff</h5>
        </div>
        <div class="card-body">
            <div class="card forms">
                <div class="card-header">
                    <h5>Search/Select Staff</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <option value="" selected disabled>Choose Staff</option>
                                <option value="">Teacher 1</option>
                                <option value="">Teacher 2</option>
                            </select>
                        </div>
                        <div class="col">
                            <form action="" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Staff" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><button class="btn btn-primary">Search</button></span><!--FIX THIS ISSUE-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card results">
                <div class="card-header">
                    <h5>My Staff(Based on Search/Select Value)</h5>
                </div>
                <div class="card-body">
                    <!--RESULTS FOR TEACHERS QUERRY-->
                </div>
            </div>
        </div>
    </div>
</div>