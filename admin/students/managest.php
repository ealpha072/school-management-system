<?php 
    require "../shared/home.php";
    $select_classes = $db->prepare('select name from forms');
    $select_stream = $db->prepare('select name from streams');

    $select_classes->execute();
    $select_stream->execute();
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Manage Students</h4>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
                        <div class="form-row">
                            <div class="col">
                                <select name="" class="form-control" required="" id="class-option">
                                    <option value="" selected disabled>Choose a class</option>
                                    <?php
                                        displayMenu($select_classes, 'name');
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="" class="form-control" required="" id="stream-option">
                                    <option value="" selected disabled>Choose a stream</option>
                                    <?php displayMenu($select_stream, 'name'); ?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" id="manage-st" >Manage</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="form-inline">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Search student Adm No" id="adm-no">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary mb-2" type="button" id="search-student">Search</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Results</h5>
                </div>
                <div class="card-body" id="result-holder">
                    <!--THIS SECTION HOLDS THE RESULTS OF THE SEARCHED ITEM--
                    ---------------------------------------------------------
                    --------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>



