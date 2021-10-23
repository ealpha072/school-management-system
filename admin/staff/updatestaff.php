<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit_staff'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from support_staff where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update staff Records: <?php echo $results['first_name'].' '.$results['mid_name'].' '.$results['last_name'];?></h4>
        </div>
        <div class="card-body">
            <?php 
                if(isset($update_staff_error) && !empty($update_staff_error)){
                    displayErrors($update_staff_error);
                }
            ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input 
                            type="text" class="form-control form-control-sm" id="name" readonly name="staff-name"
                            value="<?php echo $results['first_name'].' '.$results['mid_name'].' '.$results['last_name'];?>" 
                        >
                    </div>
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input 
                            type="email" class="form-control form-control-sm" id="" value="<?php echo $results['email']?>" name="staff-email-update"
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Phone Number</label>
                    <div class="col-sm-4">
                        <input 
                            type="number" class="form-control form-control-sm" id="name" name="staff-phone-update" required value="<?php echo $results['phone_number']?>">
                    </div>
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                    <div class="col-sm-4">
                        <select name="staff-role-update" id="" class="form-control form-control-sm" readonly>
                            <option value="" selected hidden><?php echo $results['role']?></option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-dark btn-sm" name="update-staff">Update</button>
                </div>
            </form>
        </div>
    </di>
</div>