
<?php 

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $email = $_POST["tb_email"];
    $pw = password_hash($_POST["tb_pw"], PASSWORD_DEFAULT); // Hash the password

    require("./sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    $checkEmail = "SELECT * FROM Student WHERE email = '" . $email . "'";

    $checkEmailResult = $conn->query($checkEmail);

    if($checkEmailResult->num_rows > 0){
        $row = $checkEmailResult->fetch_assoc();
        $dbPassword = $row["studentPassword"];
        echo($dbPassword);

        if($dbPassword === $pw){
            header("Location : ./student/internDashboard.php");
        }
    }
    else{
        $errMsg = "Invalid email or password.";
        header("Location: studentLogin.php?error=" . urlencode($errMsg));
        exit();
    }
    $conn->close();

}


?>