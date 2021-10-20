<?php
    require '../shared/home.php';

    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='edit'){
        $id = $_GET['id'];
        $query = $db->prepare('select * from students where id=:id');
        $query->execute(array(':id'=>$id));
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $results = $results[0];
    }
?>

<div class="container-fluid">
    <di class="card">
        <div class="card-header">
            <h4>Update student Records: Adm number <?php echo $results['adm_num']?></h4>
        </div>
        <div class="card-body">
            <form action="" method="post">

                <div class="form-group row">
                    <label for="Adm-num" class="col-sm-2 col-form-label col-form-label-sm">Adm Num</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control form-control-sm" id="Adm-num" value="<?php echo $results['adm_num'];?>" readonly>
                    </div>
                    <label for="" class="col-sm-2 col-form-label col-form-label-sm">Hostel</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" required>
                            <option value="" selected disabled><?php echo $results['hostel']?></option>
                            <?php 
                                $select_hostel->execute();
                                displayMenu($select_hostel, 'name');
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                    <div class="col-sm-4">
                        <input 
                            type="text" class="form-control form-control-sm" id="name" 
                            value="<?php echo $results['first_name'].' '.$results['mid_name'].' '.$results['last_name'];?>" 
                            readonly
                        >
                    </div>
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Parent Name</label>
                    <div class="col-sm-4">
                        <input 
                            type="email" class="form-control form-control-sm" id="name" 
                            value="<?php echo $results['parent_name']?>" 
                            readonly
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="form" class="col-sm-2 col-form-label col-form-label-sm">Form</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" required>
                            <option value="" selected disabled><?php echo $results['form']?></option>
                            <?php 
                                $select_classes->execute();
                                displayMenu($select_classes, 'name');
                            ?>
                        </select>
                    </div>
                    <label for="stream" class="col-sm-2 col-form-label col-form-label-sm">Stream</label>
                    <div class="col-sm-4">
                        <select name="" id="" class="form-control form-control-sm" required>
                            <option value="" selected disabled><?php echo $results['stream']?></option>
                            <?php 
                                $select_stream->execute();
                                displayMenu($select_stream, 'name');
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Parent Number</label>
                    <div class="col-sm-4">
                        <input 
                            type="number" class="form-control form-control-sm" id="name" required
                            value="<?php echo $results['p_phone_number']?>"
                        >
                    </div>
                    <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Parent Email</label>
                    <div class="col-sm-4">
                        <input 
                            type="email" class="form-control form-control-sm" id="name" required 
                            value="<?php echo $results['p_email']?>" 
                        >
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </di>
</div>