


<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $oldPw = substr(hash('sha256', $_POST["tb_opw"]), 0, 50);
    $newPw = substr(hash('sha256', $_POST["tb_npw"]), 0, 50);
    $conPw = substr(hash('sha256', $_POST["tb_cpw"]), 0, 50);
    $id = $_SESSION['userid'];

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    if($newPw != $conPw){
        $errMsg= "Error: Passwords do not match!";
        header("Location: studentChangePassword.php?error=" . urlencode($errMsg));
        exit();
    }

    $checkPwQuery = "SELECT * FROM Student WHERE studentId = '" . $id. "'";
    $checkPwResult = $conn->query($checkPwQuery);
    if($checkPwResult->num_rows > 0){
        $row = $checkPwResult->fetch_assoc();
        $dbPw = $row['studentPassword'];
        if($oldPw != $dbPw){
            $errMsg= "Error: Incorrect old password";
            header("Location: studentChangePassword.php?error=" . urlencode($errMsg));
            exit();
        }
    }

    
    $updateQuery = "UPDATE Student SET studentPassword = '$conPw' WHERE studentId = '$id'";

    if($conn->query($updateQuery) === TRUE){
        $succMsg = "Changed Successfully";
        header("Location: studentEditProfile.php?success=" . urlencode($succMsg));
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