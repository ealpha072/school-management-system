<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a hostel</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">
                    <div class="col">
                        <label for="role-name">Hostel Name</label>
                        <input type="text" placeholder="Name of Role" class="form-control">
                    </div>
                    <div class="col">
                        <label for="staff-name">Teacher in Incharge</label>
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Choose Name of Teacher Incharge</option>
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
                <button class="btn btn-primary">Add Hostel</button><!--button spacing consider correcting-->
            </form>
        </div>
    </div>
</div>