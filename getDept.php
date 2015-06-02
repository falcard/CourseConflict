<?php
    require "openDB.php";
    
    $query = "SELECT department FROM depts";
    $data = mysqli_query($conn, $query) or die("Error: ".mysqli_error($conn));
    
    $dept = array();
    
    while ($row = mysqli_fetch_array($data))
    {
        array_push($dept, $row["department"]);
    }
    
    echo json_encode($dept);
    
    
    require "closeDB.php";
?>

