<?php 
include("./sql/con.php");

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $email = $_POST["tb_email"];
    $name = $_POST["tb_name"];
    $phoneNo = $_POST["tb_phoneNo"];
    $gender = $_POST["ddl_gender"];
    $programme = $_POST["ddl_programme"];
    $session = $_POST["ddl_session"];
    $password = password_hash($_POST["tb_pw"], PASSWORD_DEFAULT); // Hash the password


    $checkEmail = "SELECT * FROM Student WHERE email = '" . $email . "'";

    $checkEmailResult = $conn->query($checkEmail);

    if($checkEmailResult->num_rows > 0){
        $errMsg = "Email already registered, please use another email";        
    }
    else{
        $insertQuery = "INSERT INTO Student (email, studentName, phoneNo, gender, programme, password) VALUES ('$email', '$name', '$phoneNo', '$gender', '$programme', '$password')";        

        if ($conn->query($insertQuery) === TRUE) {
            // Registration successful, redirect to the registration page
            header("Location: ./index.php");
            exit();
        } else {
            $errMsg= "Error: " . $conn->error;
            header("Location : ./register.php");
        }
    }
    $conn->close();

}

session_start();
$_SESSION['error'] = $errMsg;

?>