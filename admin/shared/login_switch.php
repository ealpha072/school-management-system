<?php
    require 'process.php';
    if(!isLoggedIn()){
        $_SESSION['msg'] = 'You must be logged in to use the application,
        taking you to login page...';
        header('location:../login/login.php');
    }

    require "../shared/header.php";
    require "../shared/footer.php";
    echo
        '<div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                    <span class="sr-only">Loading...</span>
                </div>
                <div>
                    <h1>Loading, please wait...</h1>
                </div>
            </div>
        </div>';

    header('refresh:3; url=\'../dashboard/dashboard.php\'');
    exit();
?>
