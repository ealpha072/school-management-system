<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage Subjects</h5>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <select name="" id="" class="form-control">
                        <!--consider populationg with php-->
                        <option value="" selected disabled>Subject to manage</option>
                        <option value="">Maths</option>
                        <option value="">English</option>
                    </select>
                </div>
                <div class="col">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search Subject" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><button class="btn btn-primary">Search</button></span><!--FIX THIS ISSUE-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="card results-holder">
                <div class="card-header">
                    <h5>Results</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>