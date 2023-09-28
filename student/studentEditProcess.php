

<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $name = $_POST["tb_name"];
    $phoneNo = $_POST["tb_phoneNo"];
    $gender = $_POST["ddl_gender"];
    $programme = $_POST["ddl_programme"];
    $id = $_SESSION['userid'];

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    
    $updateQuery = "UPDATE Student SET studentName = '$name', phoneNo = '$phoneNo', gender = '$gender', programme = '$programme' WHERE studentId = '$id'";

    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Submitted Successfully";
        header("Location: internDashboard.php?success=" . urlencode($succMsg));
        exit();
    }
    else{
        $errMsg= "Error: Unable to update profile" . $conn->error;
        header("Location: studentEditProfile.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>