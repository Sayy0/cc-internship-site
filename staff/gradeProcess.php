<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $grade = $_POST["ddl_grade"];
    $id = $_POST["tb_id"];

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    
    $updateQuery = "UPDATE Internship SET grade = '$grade', WHERE internshipId = '$id'";

    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Submitted Successfully";
        header("Location: staffDashboard.php?success=" . urlencode($succMsg));
        exit();
    }
    else{
        $errMsg= "Error: Unable to update profile" . $conn->error;
        header("Location: staffDashboard.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>