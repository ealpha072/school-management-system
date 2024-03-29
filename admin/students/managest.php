<?php 
    require "../shared/home.php";
    $select_classes->execute();
    $select_stream->execute();
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="float-left">
                <h5><i class="fa fa-wrench fa-sm"></i> Manage Students</h5>
            </div>
            <div class="float-right">
                <a href="addst.php" class="text-primary"><i class="fa fa-plus fa-sm"></i> Add student</a>
            </div>

        </div>
        <div class="card-body">
            <?php showSuccessMessage(); ?> 
            <div class="form-row">
                <div class="col">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET"> 
                        <div class="form-row">
                            <div class="col">
                                <select name="" class="form-control form-control-sm" required="" id="class-option">
                                    <option value="" selected disabled>Choose a class</option>
                                    <?php
                                        displayMenu($select_classes, 'name');
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="" class="form-control form-control-sm" required="" id="stream-option">
                                    <option value="" selected disabled>Choose a stream</option>
                                    <?php displayMenu($select_stream, 'name'); ?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary btn-sm" id="manage-st">Manage</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-inline">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control form-control-sm" placeholder="Search Adm No" id="adm-no">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-sm mb-2" type="button" id="search-student"><i class="fa fa-search fa-sm"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Results</h5>
                </div>
                <div class="card-body" id="result-holder" >
                    <!--THIS SECTION HOLDS THE RESULTS OF THE SEARCHED ITEM--
                    ---------------------------------------------------------
                    --------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>