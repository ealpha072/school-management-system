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
                            <select name="" id="" class="form-control">
                                <!--php population-->
                                <option value="" selected disabled>--Choose a class--</option>
                                <?php
                                    displayMenu($select_classes, 'name');
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <select name="" id="" class="form-control">
                                <option value="" selected disabled>--Choose a stream--</option>
                                <?php displayMenu($select_stream, 'name'); ?>
                            </select>
                        </div>
                        <div class="co">
                            <form action="" method="GET">
                                <div class="form-row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Search Parent" id="adm-no">
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary mb-2" type="button" id="search-student">Search</button>
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