
<?php
    $first_name = '  Alpha  ';
    $mid_name = 'Emmanuel Ochieng<>';
    $names_array = array($first_name, $mid_name);

    foreach ($names_array as $name) {
        // code...
        $new_name  = trim(htmlspecialchars(str_replace(' ', '', $name)));
        echo $new_name.'<br>';
    }
?>
