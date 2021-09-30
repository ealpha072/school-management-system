<?php require "../shared/home.php"?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage Parents</h5>
        </div>
        <div class="card-body">
            <div class="card forms">
                <div class="card-header">
                    <h6>Search/Select Parent</h6>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <!--php population-->
                                <option value="" selected disabled>Choose a class</option>
                                <option value="">Form 1</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <!--php population-->
                                <option value="">Choose a stream</option>
                                <option value="">Blue</option>
                                <option value="">Green</option>
                            </select>
                        </div>
                        <div class="co">
                            <form action="" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Parent" aria-describedby="basic-addon2">
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
                    <h6>My Parents(Based on Search/Select value)</h6>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>