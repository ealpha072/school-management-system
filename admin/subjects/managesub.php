<?php
    require "../shared/home.php";
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Manage Subjects</h5>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <select name="" id="manage-subject" class="form-control">
                        <option value="" selected disabled>Subject to manage</option>
                        <?php
                            $select_subjects->execute();
                            displayMenu($select_subjects, 'name');
                        ?>
                    </select>
                </div>
            </div>
            <hr>
            <div class="card results-holder">
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
