


<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $name = $_POST["tb_name"];
    $email = $_POST["tb_email"];
    $id = 1;

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    
    $updateQuery = "UPDATE Staff SET name = '$name', email = '$phoneNo' WHERE staffId= '$id'";

    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Submitted Successfully";
        header("Location: staffProfile.php?success=" . urlencode($succMsg));
        exit();
    }
    else{
        $errMsg= "Error: Unable to update profile" . $conn->error;
        header("Location: staffEditProfile.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>