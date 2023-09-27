<?php
    $hostname = 'ccdatabase.c47gv8tfypy1.us-east-1.rds.amazonaws.com';
    $username= 'admin';
    $password= 'internship123';
    $database= 'InternshipDB';

//    $conn = new mysqli('localhost', 'root', '', 'interndb');
//

    $conn = new mysqli($hostname, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
