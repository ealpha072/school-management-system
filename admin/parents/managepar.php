<?php 
    require "../shared/home.php";
    $select_classes->execute();
    $select_stream->execute();    
?>

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
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
                                <div class="form-row">
                                    <div class="col">
                                        <select name="" class="form-control" required="" id="class-option">
                                            <option value="" selected disabled>--Choose a class--</option>
                                            <?php
                                                displayMenu($select_classes, 'name');
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="" class="form-control" required="" id="stream-option">
                                            <option value="" selected disabled>--Choose a stream--</option>
                                            <?php displayMenu($select_stream, 'name'); ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" id="manage-parent" >Manage</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="GET" class="form-inline">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Search parent name" id="adm-no">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary mb-2" type="button" id="search-parent">Search</button>
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
                    <!--THIS SECTION HOLDS THE RESULTS OF THE SEARCHED ITEM--
                    ---------------------------------------------------------
                    --------------------------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>