<?php 
    require "../shared/home.php";
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6><i class="fa fa-building"></i> School Infomation</h6>
            <?php
                if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                }
            ?>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <?php buildCard('Students', $select_student, ['text-white', 'bg-primary'], '../students/managest.php'); ?>
                </div>
                <div class="col">
                    <?php buildCard('Teachers', $select_teacher, ['text-white','bg-dark'], '../teachers/manageteach.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-success'], '../hostels/managehost.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Streams', $select_stream, ['text-white','bg-secondary'], '#')?>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    <?php buildCard('Parents', $select_parent, ['text-white','bg-danger'], '../parents/managepar.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Subjects', $select_subjects, ['text-white','bg-warning'], '../subjects/managesub.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-info'],'../hostels/managehost.php')?>
                </div>
                <div class="col">
                    <?php buildCard('Support Staff', $select_support_staff, ['text-dark', 'bg-light'], '../staff/managestaff.php')?>
                </div>
            </div>
            <hr>
            <!--<div class="form-row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">Events</div>
                        <div class="card-body">

                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                Velit omnis modi deserunt, eos rem temporibus nesciunt quasi facilis? 
                                Perspiciatis saepe, amet voluptatem quas dolor hic deleniti dolorum error 
                                voluptatum eaque?
                            </p>
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                                Velit omnis modi deserunt, eos rem temporibus nesciunt quasi facilis? 
                                Perspiciatis saepe, amet voluptatem quas dolor hic deleniti dolorum error 
                                voluptatum eaque?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card form-row">
                        <div class="card-header">Statistics</div>
                        <div class="card-body">

                        </div>
                    </div>
                    <hr>
                   <div class="card form-row">
                        <div class="card-header">Charts</div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
</div>
