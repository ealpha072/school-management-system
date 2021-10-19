<?php   
    require 'process.php';

    if(!isLoggedIn()){
        $_SESSION['msg'] = 'You must be logged in to use the application,
        taking you to login page...';
        header('location:../login/login.php');
    }

    require 'header.php';
?>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
            <div class="sidebar-header">
                <h3>School System</h3>
                <img alt="" class="img-fluid rounded">
                <h5><?php //echo $loggedIn?></h5>
                <h6>Thanks</h6>
            </div>

            <!--dashboard items-->
            <ul class="list-unstyled components">
                <!-- dashboard-->
                <li class="">
                    <a href="../dashboard/dashboard.php"> Dashboard</a>
                </li>
                <!--students -->
                <li>
                    <a href="#student" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Students</a>
                    <ul class="collapse list-unstyled" id="student">
                        <li>
                            <a href="../students/addst.php">Add Student</a>
                        </li>
                        <li>
                            <a href="../students/bulkstudents.php">Add bulk Students</a>
                        </li>
                        <li>
                            <a href="../students/managest.php">Manage Students</a>                            
                        </li>
                    </ul>
                </li>                
                <!--syllabus-->
                <li>
                    <a href="#syllabus" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Subjects</a>
                    <ul class="collapse list-unstyled" id="syllabus">
                        <li>
                            <a href="../subjects/addsub.php">Add Subjects</a>
                        </li>
                        <li>
                            <a href="../subjects/managesub.php">Manage Subjects</a>
                            
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
                            <a href="../teachers/manageteach.php">Manage Teachers</a>
                    
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

                <li>
                    <a href="#staff" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Support Staff</a>
                    <ul class="collapse list-unstyled" id="staff">
                        <li>
                            <a href="../staff/addstaff.php">Add Staff</a>                           
                        </li>
                        <li>
                            <a href="../staff/managestaff.php">Manage Staff</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#streams" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Streams</a>
                    <ul class="collapse list-unstyled" id="streams">
                        <li>
                            <a href="../streams/addstream.php">Add Streams</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#roles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Roles</a>
                    <ul class="collapse list-unstyled" id="roles">
                        <li>
                            <a href="../roles/addrole.php">Add a Role</a>                           
                        </li>
                        <li>
                            <a href="../roles/managerole.php">Manage Roles</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#hostels" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Hostels</a>
                    <ul class="collapse list-unstyled" id="hostels">
                        <li>
                            <a href="../hostels/addhostel.php">Add a hostel</a>                           
                        </li>
                        <li>
                            <a href="../hostels/managehost.php">Manage Hostels</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">Application Settings</a>
                </li>

                <!--OTHERS-->
                <li>
                    <a href="../shared/endsession.php">Logout</a>
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
            <div class="logout">
                <b><a href="../shared/endsession.php" class="text-success">Logout</a></b>
            </div>
        </nav>
        <hr>
        

    <!--</div>-->
<!--</div>-->

<?php require "footer.php"?>
