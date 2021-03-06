<?php 
    require "../shared/home.php";
    $select_classes->execute();
    $select_stream->execute();    
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-wrench fa-sm"></i> Manage Parents</h6>
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
                                        <select name="" class="form-control form-control-sm" required="" id="class-option">
                                            <option value="" selected disabled>--Choose a class--</option>
                                            <?php
                                                displayMenu($select_classes, 'name');
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select name="" class="form-control form-control-sm" required="" id="stream-option">
                                            <option value="" selected disabled>--Choose a stream--</option>
                                            <?php displayMenu($select_stream, 'name'); ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-sm" id="manage-parent" >Manage</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">
                    <h6>My Parents(Based on Search/Select value)</h6>
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