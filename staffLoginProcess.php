<?php 

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $email = $_POST["tb_email"];
    $pw = $_POST["tb_pw"];

    require("./sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    $checkEmail = "SELECT * FROM Staff WHERE email = '" . $email . "'";

    $checkEmailResult = $conn->query($checkEmail);

    if($checkEmailResult->num_rows > 0){
        $row = $checkEmailResult->fetch_assoc();
        $dbPassword = $row["staffPassword"];
        $dbEmail = $row["email"];
        $dbId = $row["staffId"];

        if($dbPassword === $pw){

            header("Location: ./staff/staffDashboard.php");
            exit();
                $errMsg = "Unable to create session.";
                header("Location: staffLogin.php?error=" . urlencode($errMsg));
                exit();
        }
        else{
            $errMsg = "Invalid email or password.";
            header("Location: staffLogin.php?error=" . urlencode($errMsg));
            exit();
        }
    }
    else{
        $errMsg = "Invalid email or password.";
        header("Location: staffLogin.php?error=" . urlencode($errMsg));
        exit();
    }
    $conn->close();

}


?>