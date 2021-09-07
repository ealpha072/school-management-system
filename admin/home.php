<?php   require "../public/header.php"; ?>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
            <div class="sidebar-header">
                <h3>School System</h3>
                <img src="images/avatar.png" alt="">
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
                            <a href="">Add Student</a>
                        </li>
                        <li>
                            <a href="">Add Bulk Student</a>
                        </li>
                        <li>
                            <a href="">Student Information</a>
                        </li>
                    </ul>
                </li>                
                <!--syllabus-->
                <li>
                    <a href="#syllabus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic Syllabus</a>
                    <ul class="collapse list-unstyled" id="syllabus">
                        <li>
                            <a href="">Add Units</a>
                        </li>
                        <li>
                            <a href="">View Units</a>
                        </li>
                        <li>
                            <a href="" >Manage unit</a>
                            
                        </li>
                    </ul>
                </li>
                <!--Finance-->
                <li>
                    <a href="#dpts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Teachers</a>
                    <ul class="collapse list-unstyled" id="dpts">
                        <li>
                            <a href="">Add Department</a>
                        </li>
                        <li>
                            <a href="">View Departments</a>
                        </li>
                        <li>
                            <a href="">Manage Departments</a>
                    
                        </li>
                    </ul>
                </li>
                <!---->
                <li>
                    <a href="#schools" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Parents</a>
                    <ul class="collapse list-unstyled" id="schools">
                        <li>
                            <a href="addschool.php">Add Schools</a>
                        </li>
                        <li>
                            <a href="viewschool.php">View Schools</a>
                        </li>
                        <li>
                            <a href="manageschools.php">Manage schools</a>
                            
                        </li>
                    </ul>
                </li>
                <!--REGISTER-->
                <li>
                    <a href="#students" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Students</a>
                    <ul class="collapse list-unstyled" id="students">
                        <li>
                            <a href="addstudent.php">Add new student</a>
                        </li>
                        <li>
                            <a href="viewstudents.php">View students</a>
                        </li>
                        <li>
                            <a href="managestudents.php" >Manage students</a>
                        
                        </li>
                    </ul>
                </li>
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

<?php require "../public/footer.php"?>