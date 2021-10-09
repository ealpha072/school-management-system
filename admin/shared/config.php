
<?php
    $errors = ["Hello", "Hi there", "come here"];
    $login_err = ["Incorrect username", "Wrong poassword"];


    function display($array){
        echo '<div>';
            echo '<ul>';
                foreach ($array as $error_msg) {
                    // code...
                    echo '<li>'.$error_msg.'</li>';
                }
            echo '</ul>';
        echo '</div>';
    }

    display($errors);
