<?php 
    require 'process.php';

    if(!isLoggedIn()){
        $_SESSION['msg'] = 'You must be logged in first';
        header('location: register.php');
    }

    echo 'You have been successfully loged out. Do you want to '.'<a href=\'../login/login.php\'>login</a>';
    //header('');
    session_destroy();

    exit();
    
?>
