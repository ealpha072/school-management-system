<?php require "../shared/home.php";?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <p class="header">Admit new student</p>
        </div>
        <div class="card-body">
            <!--form for admitting new student-->
            <form action="" method="get" enctype="multipart/form-data"> 
                <!--Academic info card-->
                <div class="card academic_info">
                    <div class="card-header">
                        <p>Academic Info</p>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="admission-number">Adm Number<sup>*</sup></label>
                                <input type="text" placeholder="Adm Number" class="form-control">
                            </div>
                            <div class="col">
                                <label for="form">Form<sup>*</sup></label>
                                <select name="form" id="" class="form-control">
                                    <option value="" selected disabled>Choose a form</option>
                                    <option value="">Form One</option>
                                    <option value="">Form Two</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="stream">Stream<sup>*</sup></label>
                                <select name="stream" id="" class="form-control">
                                    <option value="" selected disabled>Choose a stream</option>
                                    <option value="">Blue</option>
                                    <option value="">Red</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="hostel">Hostel<sup>*</sup></label>
                                <select name="hostel" id="" class="form-control">
                                    <option value="" selected disabled>Choose a hostel</option>
                                    <option value="">Mars</option>
                                    <option value="">Pluto</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="admission-date">Admission Date</label>
                                <input type="text" disabled value="<?php echo date("Y/m/d")?>" class="form-control">
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
                                <input type="text" placeholder="First Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="middle-name">Middle Name<sup>*</sup></label>
                                <input type="text" placeholder="Middle Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="last-name">Last Name<sup>*</sup></label>
                                <input type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="gender">Gender<sup>*</sup></label>
                                <input type="text" placeholder="Gender" class="form-control">
                            </div>
                            <div class="col">
                                <label for="Nationality">Nationality<sup>*</sup></label>
                                <input type="text" placeholder="Nationality" class="form-control">
                            </div>
                            <div class="col">
                                <label for="county">County<sup>*</sup></label>
                                <input type="text" placeholder="County" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="photo">Passport photo <sup>*</sup></label>
                                <input type="file" placeholder= "Upload a passport file" class="form-control">
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
                                <label for="first-name">First Name<sup>*</sup></label>
                                <input type="text" placeholder="First Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mid-name">Mid Name<sup>*</sup></label>
                                <input type="text" placeholder="Mid Name" class="form-control">
                            </div>
                            <div class="col">
                                <label for="last-name">Last Name<sup>*</sup></label>
                                <input type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="email">Email <sup>*</sup></label>
                                <input type="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="col">
                                <label for="phone-number">Phone Number <sup>*</sup></label>
                                <input type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of card-->
            </form>
            <!--END OF FORM-->
        </div>
    </div>
</div>