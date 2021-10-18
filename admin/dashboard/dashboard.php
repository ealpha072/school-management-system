<?php 
    require "../shared/home.php";
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h6>School Infomation</h6>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <?php buildCard('Students', $select_student, ['text-white', 'bg-primary']); ?>
                </div>
                <div class="col">
                    <?php buildCard('Teachers', $select_teacher, ['text-white','bg-dark'])?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-success'])?>
                </div>
                <div class="col">
                    <?php buildCard('Streams', $select_stream, ['text-white','bg-secondary'])?>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    <?php buildCard('Parents', $select_parent, ['text-white','bg-danger'])?>
                </div>
                <div class="col">
                    <?php buildCard('Subjects', $select_subjects, ['text-white','bg-warning'])?>
                </div>
                <div class="col">
                    <?php buildCard('Hostels', $select_hostel, ['text-white','bg-info'])?>
                </div>
                <div class="col">
                    <?php buildCard('Support Staff', $select_support_staff, ['text-dark', 'bg-light'])?>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">Events</div>
                        <div class="card-body">
                            <!--display calender-->
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
                            <!--display school statistics-->
                        </div>
                    </div>
                    <hr>
                   <div class="card form-row">
                        <div class="card-header">Charts</div>
                        <div class="card-body">
                            <!--display school statistics-->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
