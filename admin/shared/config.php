
<?php
    $phone = '+254798975799';

    if(preg_match('/^(\+254)\d{9}$/', $phone)){
        echo "This is a valid number";
    }else{
        echo "Invalidd number";
    }
?>
