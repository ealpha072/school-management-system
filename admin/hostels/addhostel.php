<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a hostel</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_hostel_error) && !empty($add_hostel_error)){
                        displayErrors($add_hostel_error);
                    }
                ?>

                <div class="form-row">
                    <div class="col">
                        <label for="role-name">Hostel Name</label>
                        <input type="text" placeholder="Name of Hostel" class="form-control" name="name">
                    </div>
                    <div class="col">
                        <label for="staff-name">Teacher in Incharge</label>
                        <select name="teacher" id="" class="form-control">
                            <option value="" selected disabled>Choose name of Teacher Incharge</option>
                            <option value="Mr Njiru">Mr Njiru</option>
                            <!--php population-->
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    
                    <div class="col">
                        <label for="date">Date of creating</label>
                        <input type="text" readonly value="<?php echo date("Y/m/d"); ?>" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="button">
                    <button class="btn btn-primary" type="submit" name="add-hostel">Add Hostel</button><!--button spacing consider correcting-->
                </div>

            </form>
        </div>
    </div>
</div>
