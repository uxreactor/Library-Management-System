 <?php
    $full_name = $_SERVER['PHP_SELF'];
    $name_array = explode('/',$full_name);
    $count = count($name_array);
    $page_name = $name_array[$count-1];
?> 