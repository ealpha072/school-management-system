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
                        <div class="form-row">
                            <div class="col">
                                <label for="admission-number">Adm Number<sup>*</sup></label>
                                <input type="number" placeholder="Adm Number" class="form-control" name="adm_num" required>
                            </div>
                            <div class="col">
                                <label for="form">Form<sup>*</sup></label>
                                <select name="form" id="" class="form-control" required>
                                    <option value=""  disabled selected="">--Choose a form--</option>
                                    <?php
                                        displayMenu($select_classes, 'name');
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="stream">Stream<sup>*</sup></label>
                                <select name="stream" id="" class="form-control" required>
                                    <option value="" disabled selected="">--Choose a stream--</option>
                                    <?php displayMenu($select_stream, 'name'); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="hostel">Hostel<sup>*</sup></label>
                                <select name="hostel" id="" class="form-control" required>
                                    <option value="" disabled selected="">--Choose a hostel--</option>
                                    <?php displayMenu($select_hostel, 'name');?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="admission-date">Admission Date</label>
                                <input type="text" disabled value="<?php echo date("Y/m/d")?>" class="form-control" name= "adm-date">
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
                        <div class="form-row">
                            <div class="col">
                                <label for="first-name">First Name<sup>*</sup></label>
                                <input type="text" placeholder="First Name" class="form-control" name="first-name" required>
                            </div>
                            <div class="col">
                                <label for="middle-name">Middle Name<sup>*</sup></label>
                                <input type="text" placeholder="Middle Name" class="form-control" name="middle-name" required>
                            </div>
                            <div class="col">
                                <label for="last-name">Last Name<sup>*</sup></label>
                                <input type="text" placeholder="Last Name" class="form-control" name="last-name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="gender">Gender<sup>*</sup></label>
                                <select name="gender" id="" class="form-control" required>
                                    <option value="" disabled selected="">--Choose Gender--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="county">County<sup>*</sup></label>
                                <input type="text" placeholder="County" class="form-control" name="county" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="photo">Passport photo <sup>*</sup></label>
                                <input type="file" placeholder= "Upload a passport file" class="form-control" name="student-photo" required>
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
                        <div class="form-row">
                            <div class="col">
                                <label for="parent-name">Full Name<sup>*</sup></label>
                                <input type="text" placeholder="Firstname Midname Lastname" class="form-control" name="pfirst-name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="email">Email <sup>*</sup></label>
                                <input type="email" placeholder="Email Address" class="form-control" name="pemail" required="">
                            </div>
                            <div class="col">
                                <label for="phone-number">Phone Number <sup>*</sup></label>
                                <input type="text" placeholder="Phone Number" class="form-control" name="pphone-number" required>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The student was successfully added
        <?php echo $_POST['pemail']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--data-toggle="modal" data-target="#myModal"-->




