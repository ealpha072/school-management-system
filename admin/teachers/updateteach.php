<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit_teacher'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from teachers where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }

?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update teacher Records: <?php echo $results['first_name'].' '.$results['mid_name'].' '.$results['last_name'];?></h4>
        </div>
        <div class="card-body">
            <?php 
                if(isset($update_teacher_error) && !empty($update_teacher_error)){
                    displayErrors($update_teacher_error);
                } 
            ?>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input 
                            type="text" class="form-control form-control-sm" id="name" 
                            value="<?php echo $results['first_name'].' '.$results['mid_name'].' '.$results['last_name'];?>" 
                            readonly
                        >
                    </div>
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-4">
                        <input 
                            type="email" class="form-control form-control-sm" id="" 
                            value="<?php echo $results['email']?>" name="teacher-email-update"
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Subject 1</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" required disabled>
                            <option value="" selected disabled><?php echo $results['subject_1']?></option>
                        </select>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Subject 2</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" disabled>
                            <option value="" selected disabled><?php echo $results['subject_2']?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Phone Number</label>
                    <div class="col-sm-4">
                        <input 
                            type="number" class="form-control form-control-sm" id="name" required
                            value="<?php echo $results['phone_number']?>" name="teacher-num-update"
                        >
                    </div>
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                    <div class="col-sm-4">
                        <select name="teacher-role-update" id="" class="form-control form-control-sm">
                            <option value="" selected disabled><?php echo $results['role']?></option>
                            <?php 
                                $select_roles->execute(array(':type'=>'Teaching staff', ':name'=>'Leave Unassigned'));
                                displayMenu($select_roles, 'role_name');
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="update-teacher">Update</button>
                </div>
            </form>
        </div>
    </di>
</div>