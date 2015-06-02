<!-- this file takes user input and outputs conflicts, if any -->

<?php

// create variables to collect the data
$department = $_POST['department'];
$course	= $_POST['course'];

// print to screen users input
echo "Department: ";
echo strtoupper($department);
echo "<br />";
echo "Course: ";
echo strtoupper($course);
echo "<br />";

// open connection to database
require "openDB.php";

// get start time from database 
$query1 = "SELECT startTime FROM data2 WHERE department = '{$department}' AND courseID = '{$course}'";
$time1 = mysqli_query($conn, $query1);
while($record = mysqli_fetch_array($time1)){
    echo "Start Time: ";
    echo $record['startTime'];
    echo "<br />";
}

// get end time from database 
$query2 = "SELECT endTime FROM data2 WHERE department = '{$department}' AND courseID = '{$course}'";
$time2 = mysqli_query($conn, $query2);
while($record = mysqli_fetch_array($time2)){
    echo "End Time: ";
    echo $record['endTime'];
    echo "<br />";
}

// get ConflictCode from database for user input class
$query3 = "SELECT ConflictCode FROM data2 WHERE department = '{$department}' AND courseID = '{$course}'";
$time3 = mysqli_query($conn, $query3);
while($record = mysqli_fetch_array($time3)){
    echo "Conflict Code: ";
    echo $record['ConflictCode'];
    $code = $record['ConflictCode'];
    echo "<br />";
}

// get Mon from database for user input class
$query4 = "SELECT mon FROM data2 WHERE department = '{$department}' AND courseID = '{$course}'";
$time4 = mysqli_query($conn, $query4);


// get Tue from database for user input class
$query5 = "SELECT tue FROM data2 WHERE department = '{$department}' AND courseID = '{$course}'";
$time5 = mysqli_query($conn, $query5);


// empty line
echo "<br />";

// get multidimensional array from mySQL to compare
$check_array = array();
$query6 = "SELECT department, courseID, title, mon, tue, startTime, endTime, ConflictCode FROM data2";
$check = mysqli_query($conn, $query6);

while($row = mysqli_fetch_array($check))
{
    $check_array[] = $row;
}

$arrlength = count($check_array); // get length of $check_array

// build table
echo "<table border=1>
<tr>
<th>Department</th>
<th>Course ID</th>
<th>Title</th>
<th>Start Time</th>
<th>End Time</th>
</tr>";

// print results
for ($i = 0; $i < $arrlength; $i++) {
    
    // code 1 conflicts with 1 and 2
    if ($code == 0) {
        if ($check_array[$i][7] == $code) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) + 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code + 2)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // code 1 conflicts with 0 and 2 
    if ($code == 1) {
        if ($check_array[$i][7] == $code) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code + 1)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // codes 2 conflicts with 1 and 3
    if ($code == 2) {
        if ($check_array[$i][7] == $code - 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code + 1)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // code 3 conflicts with 1, 2, 4 and 5
    if ($code == 3) {
        if ($check_array[$i][7] == $code - 2) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) - 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == $code + 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) + 2) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // code 4 conflicts with 2, 3 and 5
    if ($code == 4) {
        if ($check_array[$i][7] == $code - 2) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) - 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == $code + 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // codes 5 conflicts with 3 and 4
    if ($code == 5) {
        if ($check_array[$i][7] == $code - 2) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) - 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code)) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // code 6 conflicts with 7 and code 8 conflicts with 9
    if ($code == 6 or $code == 8) {
        if ($check_array[$i][7] == $code) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == ($code) + 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
    
    // code 7 conflicts with 6 and code 9 conflicts with 8
    if ($code == 7 or $code == 9) {
        if ($check_array[$i][7] == ($code) - 1) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
        if ($check_array[$i][7] == $code) {
            echo "<tr>";
            echo "<td>" . $check_array[$i][0] . "</td>";
            echo "<td>" . $check_array[$i][1] . "</td>";
            echo "<td>" . $check_array[$i][2] . "</td>";
            echo "<td>" . $check_array[$i][5] . "</td>";
            echo "<td>" . $check_array[$i][6] . "</td>";
            echo "</tr>";
        }
    }
}
echo "</table>";


// close connection to database
require "closeDB.php";


?>