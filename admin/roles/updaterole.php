<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit_role'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from staff_roles where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update roles Records</h4>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $results['role_name']?>" readonly>
                    </div>

                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Staff Type</label>
                    <div class="col-sm-4">
                        <select name="" id="staff-type" class="form-control form-control-sm">
                            <option value="<?php echo strtolower($results['staff_type'])?>"><?php echo $results['staff_type']?></option>
                            <option value="teaching staff">Teaching Staff</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Staff Incharge</label>
                    <div class="col-sm-4">
                        <select type="text" name="" id="staff-incharge" class="form-control form-control-sm">
                            <option value="<?php echo $results['staff_name']?>"><?php echo $results['staff_name']?></option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </di>
</div>