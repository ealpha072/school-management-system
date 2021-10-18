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
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <?php
                                $select_student->execute();
                                $results = $select_student->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <h4>Students: <?php echo count($results) ?></h5>
                            <h6>Total Students</h6>
                        </div>
                        <div class="card-footer">
                            <a href="../students/managest.php">View</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-secondary">
                        <div class="card-body">
                            <?php 
                                $select_teacher->execute(); 
                                $teachers = $select_teacher->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <h4>Teachers: <?php echo count($teachers)?></h5>
                            <h6>Total Teachers</h6>
                        </div>
                        <div class="card-footer">
                            <a href="">View</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h3>7</h3>
                            <h4>Hostels</h5>
                            <h6>Total Hostels</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <h3>2</h3>
                            <h4>Streams</h5>
                            <h6>Total Streams</h6>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h3>10</h3>
                            <h4>Parents</h5>
                            <h6>Total Parents</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h3>10</h3>
                            <h4>Subjects</h5>
                            <h6>Total Subjects</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h3>10</h3>
                            <h4>Students</h5>
                            <h6>Total Students</h6>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-black bg-light">
                        <div class="card-body">
                            <h3>10</h3>
                            <h4>Students</h5>
                            <h6>Total Students</h6>
                        </div>
                    </div>
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
