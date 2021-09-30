<?php require "../shared/home.php";?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Add a role</h5>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">
                    <div class="col">
                        <label for="staff-type">Staff Type(Type of staff Doing the role)</label>
                        <select name="" id="" class="form-control">
                            <option value="">Teaching Staff</option>
                            <option value="">Non Teaching Staff</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="role-name">Role Name</label>
                        <input type="text" placeholder="Name of Role" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col">
                        <label for="staff-name">Staff Incharge</label>
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>Choose Name of Staff Incharge</option>
                            <!--php population-->
                        </select>
                    </div>
                    <div class="col">
                        <label for="date">Date of assigning role</label>
                        <input type="text" readonly value="<?php echo date("Y/m/d"); ?>" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary">Add Role</button><!--button spacing consider correcting-->
            </form>
        </div>
    </div>
</div>