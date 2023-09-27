<?php 

$errMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $email = $_POST["tb_email"];
    $name = $_POST["tb_name"];
    $phoneNo = $_POST["tb_phoneNo"];
    $gender = $_POST["ddl_gender"];
    $programme = $_POST["ddl_programme"];
    $session = $_POST["ddl_session"];

    $pw = substr(hash('sha256', $_POST["tb_pw"]), 0, 50); // Hash the password

    require("./sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    $checkEmail = "SELECT * FROM Student WHERE email = '" . $email . "'";

    $checkEmailResult = $conn->query($checkEmail);

    if($checkEmailResult->num_rows > 0){
        $errMsg = "Email already registered, please use another email";
        header("Location: register.php?error=" . urlencode($errMsg));
        exit();
    }
    else{
        $insertQuery = "INSERT INTO Student (email, studentName, phoneNo, gender, programme, studentPassword) VALUES ('$email', '$name', '$phoneNo', '$gender', '$programme', '$pw')";        

        if ($conn->query($insertQuery) === TRUE) {
            $getEmail = $conn->query($getEmail);
            $row = $getEmail->fetch_assoc();
            $studentId = $row["studentId"];

            $createInternQuery = "INSERT INTO Internship (studentId, indemnityStatus, parentsAckStatus, acceptanceLtrStatus, report1Status, report2Status, report3Status, findalReportStatus) VALUES ('$studentId', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty', 'empty')";
            if($conn->query($createInternQuery) === TRUE){
                header("Location: studentLogin.php");
                exit();
            }
            else{
                $errMsg= "Error: " . $conn->error;
                header("Location: register.php?error=" . urlencode($errMsg));
                exit();
            }
            // Registration successful, redirect to the registration page
        } else {
            $errMsg= "Error: " . $conn->error;
            header("Location: register.php?error=" . urlencode($errMsg));
            exit();
            
        }
    }
    $conn->close();

}


?>