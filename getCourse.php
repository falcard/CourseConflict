<?php
    if(isset($_GET["department"]))
    {
    require "openDB.php";
    
    $dpt = $_GET["department"];
    
    $query = "SELECT data2.courseID FROM data2 INNER JOIN depts ON data2.id=depts.id WHERE depts.department LIKE '{$dpt}'";
    $data = mysqli_query($conn, $query);
    
    $course = array();
    
    while ($row = mysqli_fetch_array($data))
    {
        array_push($course, $row["courseID"]);
    }
    
    echo json_encode($course);
    
    require "closeDB.php";
    }
?>