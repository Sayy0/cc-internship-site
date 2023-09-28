
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
        $dbId = $row["studentId"];
        

        if($dbPassword === $pw){

            $internQuery = "SELECT * FROM Internship WHERE studentid = '$dbId'";
            $internResult = $conn->query($internQuery);
            if($internResult->num_rows > 0){
                $row = $internResult->fetch_assoc();
                $indemnityStatus = $row["indemnityStatus"];
                $parentsStatus = $row["parentsAckStatus"];
                $acceptanceResult = $row["acceptanceLtrStatus"];
                $report1Status = $row["report1Status"];
                $report2Status = $row["report2Status"];
                $report3Status = $row["report3Status"];
                $finalReportStatus = $row["finalReportStatus"];

                session_start();
                $_SESSION['userid'] = $dbId;
                $_SESSION['indemStatus'] = $indemnityStatus;
                $_SESSION['parentsStatus'] = $parentsStatus;
                $_SESSION['acceptanceStatus'] = $acceptanceStatus;
                $_SESSION['rpt1Status'] = $report1Status;
                $_SESSION['rpt2Status'] = $report2Status;
                $_SESSION['rpt3Status'] = $report3Status;
                $_SESSION['finalStatus'] = $finalReportStatus;
                header("Location: ./student/internDashboard.php");
                exit();
            } 
            else{
                $errMsg = "Unable to create session.";
                header("Location: studentLogin.php?error=" . urlencode($errMsg));
                exit();
            }

        }
        else{
            $errMsg = "Invalid email or password.";
            header("Location: studentLogin.php?error=" . urlencode($errMsg));
            exit();
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