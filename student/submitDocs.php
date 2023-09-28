
<?php 

session_start();
$errMsg = "";
$succMsg = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the registration form
    $indemnForm = $_FILES["input_indemnForm"]; 
    $parentsForm = $_FILES["input_parentsForm"];
    $companyLtr = $_FILES["input_companyLtr"];
    $internId= $_SESSION["internId"];

    $saveDir = "./documents/" . $internId . "/";

    if(!is_dir($saveDir)){
        mkdir($saveDir, 0777, true);
    }

    require("../sql/connectDB.php");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

    $indemnFP = $saveDir . basename($internId . "_indemnityForm.pdf");
    $parentsFP = $saveDir . basename($internId . "_parentsAcknowledgementForm.pdf");
    $companyFP = $saveDir . basename($internId . "_companyAcceptanceLetter.pdf");

    if (file_exists($indemnFP)) {
        unlink($indemnFP); // Delete the existing file
    }
    if (file_exists($parentsFP)) {
        unlink($parentsFP); // Delete the existing file
    }
    if (file_exists($companyFP)) {
        unlink($companyFP); // Delete the existing file
    }

    if (move_uploaded_file($indemnForm["tmp_name"], $indemnFP) &&
        move_uploaded_file($parentsForm["tmp_name"], $parentsFP) &&
        move_uploaded_file($companyLtr["tmp_name"], $companyFP)) {

        $updateQuery = "UPDATE Internship SET indemnityStatus = 'pending', parentsAckStatus = 'pending', acceptanceLtrStatus = 'pending', indemnityFP = '$indemnFP', parentsAckFP = '$parentsFP', acceptanceLtrFP = '$companyFP' WHERE internshipId = $internId";

        if($conn->query($updateQuery) === TRUE){

            $internQuery = "SELECT * FROM Internship WHERE internshipId = '$internId'";
            $internResult = $conn->query($internQuery);
            if($internResult->num_rows > 0){
                $row = $internResult->fetch_assoc();
                $internId = $row["internshipId"];
                $indemnityStatus = $row["indemnityStatus"];
                $parentsStatus = $row["parentsAckStatus"];
                $acceptanceStatus = $row["acceptanceLtrStatus"];
                $report1Status = $row["report1Status"];
                $report2Status = $row["report2Status"];
                $report3Status = $row["report3Status"];
                $finalReportStatus = $row["finalReportStatus"];
                $grade = $row["grade"];

                $_SESSION['internId'] = $internId; 
                $_SESSION['indemnityStatus'] = $indemnityStatus;
                $_SESSION['parentsStatus'] = $parentsStatus;
                $_SESSION['acceptanceStatus'] = $acceptanceStatus;
                $_SESSION['rpt1Status'] = $report1Status;
                $_SESSION['rpt2Status'] = $report2Status;
                $_SESSION['rpt3Status'] = $report3Status;
                $_SESSION['finalStatus'] = $finalReportStatus;
                $_SESSION['grade'] = $grade;
                $succMsg = "Submitted Successfully";
                header("Location: internDashboard.php?success=" . urlencode($succMsg));
                exit();
            } 
            else{
                $errMsg = "Unable to create session.";
                header("Location: internDashboard.php?error=" . urlencode($errMsg));
                exit();
            }
        }
        else{
            $errMsg= "Error: Unable to update database" . $conn->error;
            header("Location: internDashboard.php?error=" . urlencode($errMsg));
            exit();
        }

    
    }
    else{
        $errMsg= "Error: Unable to upload files";
        header("Location: internDashboard.php?error=" . urlencode($errMsg));
        exit();
    }



    $conn->close();

}


?>