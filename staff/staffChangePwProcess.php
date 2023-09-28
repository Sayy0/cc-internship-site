



<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $oldPw = $_POST["tb_opw"];
    $newPw = $_POST["tb_npw"];
    $conPw = $_POST["tb_cpw"];
    $id = 1;

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    if($newPw != $conPw){
        $errMsg= "Error: Passwords do not match!";
        header("Location: staffChangePassword.php?error=" . urlencode($errMsg));
        exit();
    }

    $checkPwQuery = "SELECT * FROM Staff WHERE staffId= '" . $id. "'";
    $checkPwResult = $conn->query($checkPwQuery);
    if($checkPwResult->num_rows > 0){
        $row = $checkPwResult->fetch_assoc();
        $dbPw = $row['staffPassword'];
        if($oldPw != $dbPw){
            $errMsg= "Error: Incorrect old password";
            header("Location: staffChangePassword.php?error=" . urlencode($errMsg));
            exit();
        }
    }

    
    $updateQuery = "UPDATE Staff SET staffPassword = '$conPw' WHERE staffId = '$id'";

    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Changed Successfully";
        header("Location: staffProfile.php?success=" . urlencode($succMsg));
        exit();
    }
    else{
        $errMsg= "Error: Unable to Change Password" . $conn->error;
        header("Location: staffProfile.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>