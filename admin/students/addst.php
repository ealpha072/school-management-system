<?php
    require "../shared/home.php";
    $select_hostel = $db->prepare('select name from hostels');

    $select_classes->execute();
    $select_stream->execute();
    $select_hostel->execute();
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <p class="header">Admit new student <?php //echo $log?></p>
        </div>
        <div class="card-body">
            <!--form for admitting new student-->
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                <?php
                    echo showSuccessMessage();

                    if(isset($add_student_error) && !empty($add_student_error)){
                        displayErrors($add_student_error);
                    }
                ?>
                <!--Academic info card-->
                <div class="card academic_info">
                    <div class="card-header">
                        <p>Academic Info</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                                <label for="admission-number" class="col-sm-2 col-form-label col-form-label-sm">Adm Num<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <input type="number" placeholder="Adm Number" class="form-control form-control-sm" name="adm_num" required>
                                </div>
                            
                                <label for="form" class="col-sm-2 col-form-label col-form-label-sm">Form<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select name="form" id="" class="form-control form-control-sm" required>
                                        <option value=""  disabled selected="">--Form--</option>
                                        <?php
                                            displayMenu($select_classes, 'name');
                                        ?>
                                    </select>
                                </div>
                                
                        </div>

                        <div class="form-group row">
                                <label for="stream" class="col-sm-2 col-form-label col-form-label-sm">Stream<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select name="stream" id="" class="form-control form-control-sm" required>
                                        <option value="" disabled selected="">--Stream--</option>
                                        <?php displayMenu($select_stream, 'name'); ?>
                                    </select>
                                </div>
                            
                                <label for="hostel" class="col-sm-2 col-form-label col-form-label-sm">Hostel<sup>*</sup></label>
                                <div class="col-sm-4">
                                    <select name="hostel" id="" class="form-control form-control-sm" required>
                                        <option value="" disabled selected="">--Hostel--</option>
                                        <?php displayMenu($select_hostel, 'name');?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="admission-date" class="col-sm-2 col-form-label col-form-label-sm">Date</label>
                            <div class="col-sm-4">
                                <input type="text" disabled value="<?php echo date("Y/m/d")?>" class="form-control form-control-sm" name= "adm-date">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END OF CARD-->
                
                <!--personal card info-->
                <div class="card personal_info">
                    <div class="card-header">
                        <p>Personal Info</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="first-name" class="col-sm-2 col-form-label col-form-label-sm">First Name<sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="First Name" class="form-control form-control-sm" name="first-name" required>
                            </div>

                            <label for="middle-name" class="col-sm-2 col-form-label col-form-label-sm">Middle Name<sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Middle Name" class="form-control form-control-sm" name="middle-name" required>
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label for="last-name" class="col-sm-2 col-form-label col-form-label-sm">Last Name<sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Last Name" class="form-control form-control-sm" name="last-name" required>
                            </div>

                            <label for="gender" class="col-sm-2 col-form-label col-form-label-sm">Gender<sup>*</sup></label>
                            <div class="col-sm-4">
                                <select name="gender" id="" class="form-control form-control-sm" required>
                                    <option value="" disabled selected="">--Choose Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF CARD-->
                
                <!--conatct info card-->
                <div class="card contact_info">
                    <div class="card-header">
                        <p>Contact(Student's Parent/Guardian) Info</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">

                            <label for="parent-name" class="col-sm-2 col-form-label col-form-label-sm">Full Name<sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Firstname Midname Lastname" class="form-control form-control-sm" name="pfirst-name" required>
                            </div>

                            <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="email" placeholder="Email Address" class="form-control form-control-sm" name="pemail" required="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone-number" class="col-sm-2 col-form-label col-form-label-sm">Phone Number <sup>*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" placeholder="Phone Number" class="form-control form-control-sm" name="pphone-number" required>
                            </div>
                        </div>
                        <hr>
                        <div class="submit">
                            <button class="btn btn-primary" type="submit" name="add-student" id="addnewstudent">Add Student</button>
                        </div>
                    </div>
                </div>
                <!--end of card-->
            </form>
            <!--END OF FORM-->
        </div>
    </div>
</div>




