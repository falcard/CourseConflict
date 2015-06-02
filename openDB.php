<?php

    require "config.php";
    
    $conn = mysqli_connect($host, $username, $password, $database) or die ("Could not connect");
    mysqli_select_db($conn, $database);

?>