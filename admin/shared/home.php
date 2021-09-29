<?php   require "header.php"; ?>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
            <div class="sidebar-header">
                <h3>School System</h3>
                <img src="" alt="">
                <h5>Admin</h5>
            </div>

            <!--dashboard items-->
            <ul class="list-unstyled components">
                <!-- dashboard-->
                <li class="active">
                    <a href=" " data-toggle="collapse"> Dashboard</a>
                </li>
                <!--students -->
                <li>
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Students</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li>
                            <a href="../students/addst.php">Add Student</a>
                        </li>
                        <li>
                            <a href="#forms" data-toggle="collapse" class="dropdown-toggle">Manage Students</a>
                            <!--consider populating this using php-->
                            <ul class="collapse list-unstyled" id="forms">
                                <li>
                                    <a href="#form1streams" data-toggle="collapse" class="dropdown-toggle">Form 1</a>
                                    <ul class="collapse list-unstyled" id="form1streams">
                                        <li><a href="">Blue</a></li>
                                        <li><a href="">Green</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#form2streams" data-toggle="collapse" class="dropdown-toggle">Form 2</a>
                                    <ul class="collapse list-unstyled" id="form2streams">
                                        <li><a href="">Blue</a></li>
                                        <li><a href="">Green</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#form3streams" data-toggle="collapse" class="dropdown-toggle">Form 3</a>
                                    <ul class="collapse list-unstyled" id="form3streams">
                                        <li><a href="">Blue</a></li>
                                        <li><a href="">Green</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#form4streams" data-toggle="collapse" class="dropdown-toggle">Form 4</a>
                                    <ul class="collapse list-unstyled" id="form4streams">
                                        <li><a href="">Blue</a></li>
                                        <li><a href="">Green</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>                
                <!--syllabus-->
                <li>
                    <a href="#syllabus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic Syllabus</a>
                    <ul class="collapse list-unstyled" id="syllabus">
                        <li>
                            <a href="../subjects/addsub.php">Add Subjects</a>
                        </li>
                        <li>
                            <a href="" >Manage Subjects</a>
                            
                        </li>
                    </ul>
                </li>
                <!--Finance-->
                <li>
                    <a href="#dpts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Teachers</a>
                    <ul class="collapse list-unstyled" id="dpts">
                        <li>
                            <a href="../teachers/addteach.php">Add Teacher</a>
                        </li>
                        <li>
                            <a href="">Manage Teachers</a>
                    
                        </li>
                    </ul>
                </li>
                <!---->
                <li>
                    <a href="#schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Parents</a>
                    <ul class="collapse list-unstyled" id="schools">
                        <li>
                            <a href="../parents/managepar.php">Manage Parents</a>                           
                        </li>
                    </ul>
                </li>
                <!--REGISTER-->
                <!--OTHERS-->
                <li>
                    <a href="login.php">Logout</a>
                </li>
            </ul>
    </nav>
    <!--sidebar toggle button-->
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
        <hr>
        

    <!--</div>-->
<!--</div>-->

<?php require "footer.php"?>