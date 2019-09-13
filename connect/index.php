<?php
    $error = "";
    $db = mysqli_connect('localhost', 'root', '', 'todo');
    if($db === false) {
        die("ERROR: Could not connect. "
            . $db->connect_error);
    }
?>