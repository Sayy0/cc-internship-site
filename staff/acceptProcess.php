
<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $id = $_POST["tb_id"];

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    
    $updateQuery = "UPDATE Internship SET indemnityStatus = 'accepted', parentsAckStatus = 'accepted', acceptanceLtrStatus = 'accepted' WHERE internshipId = $id";


    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Accepted Successfully";
        header("Location: staffUpcomingSession.php?success=" . urlencode($succMsg));
        exit();
    }
    else{
        $errMsg= "Error: Unable to update profile" . $conn->error;
        header("Location: staffUpcomingSession.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>