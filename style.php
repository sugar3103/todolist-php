<?php
    require "lib/scssphp/scss.inc.php";
    $scss = new scssc();
    $scss->setFormatter("scss_formatter");
    $server = new scss_server("ui", null, $scss);
    $server->serve();       
?>