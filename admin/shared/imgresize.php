<?php

    $pass = 'fjkddksjksdsdf';

    $userpass = 'fjkddksjksdsdf';

    $options = [
        'cost' => 11
    ];

    $hashed_password=password_hash($pass, PASSWORD_BCRYPT, $options);

    echo $hashed_password;

    if(password_verify($userpass,$hashed_password)){
        //success
        echo "Verified";
    }else{
        //failed
        echo 'Error';
    }
?>
