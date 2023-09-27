
<?php 

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $email = $_POST["tb_email"];
    $pw = substr(hash('sha256', $_POST["tb_pw"]), 0, 50); // Hash the password

    require("./sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    $checkEmail = "SELECT * FROM Student WHERE email = '" . $email . "'";

    $checkEmailResult = $conn->query($checkEmail);

    if($checkEmailResult->num_rows > 0){
        $row = $checkEmailResult->fetch_assoc();
        $dbPassword = $row["studentPassword"];
        $dbEmail = $row["email"];
        
        echo("Email : " . $email);
        echo("Pw: " . $pw);

        echo("dbEmail : " . $dbEmail);
        echo("dbPw: " . $dbPassword);

        if($dbPassword === $pw){
            header("Location: ./student/internDashboard.php");
        }
        /*
        else{
            $errMsg = "Invalid email or password.";
            header("Location: studentLogin.php?error=" . urlencode($errMsg));
            exit();
        }
        */
    }
    else{
        $errMsg = "Invalid email or password.";
        header("Location: studentLogin.php?error=" . urlencode($errMsg));
        exit();
    }
    $conn->close();

}


?>