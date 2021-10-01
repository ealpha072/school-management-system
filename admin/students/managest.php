<?php require "../shared/home.php"; ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Manage Students</h4>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col">
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose a class</option>
                                    <option value="">Form 1</option>
                                    <option value="">Form 2</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="" id="" class="form-control">
                                    <option value="" selected disabled>Choose a stream</option>
                                    <option value="">Red</option>
                                    <option value="">Green</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary" onclick="">Manage</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <form action="" method="post" class="form-inline">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Search student Adm No">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mb-2" type="submit">Search</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
            <div class="card result-holder">
                <div class="card-header">
                    <h5>Results</h5>
                </div>
                <div class="card-body">
                    <!--THIS SECTION HOLDS THE RESULTS OF THE SEARCHED ITEM--
                    ---------------------------------------------------------
                    ---------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>