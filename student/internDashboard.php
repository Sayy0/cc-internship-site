<?php 
session_start();
$id = $_SESSION['userid'];
$internId = $_SESSION['internId'];
$indemnityStatus = $_SESSION['indemnityStatus'];
$parentsStatus = $_SESSION['parentsStatus'];
$acceptanceStatus = $_SESSION['acceptanceStatus'];
$r1Status = $_SESSION['rpt1Status'];
$r2Status = $_SESSION['rpt2Status'];
$r3Status = $_SESSION['rpt3Status'];
$frStatus = $_SESSION['finalStatus'];
$grade = $_SESSION['grade'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Document Submission</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<!--=========================================================================== nav bar ===========================================================================-->
		<nav class="navbar navbar-dark bg-dark text-light p-3">
			<a href="./internDashboard.php" class="h4 text-decoration-none">Student Dashboard</a>
			<div>
				<a href="./studentProfile.php" class="mx-2 btn btn-primary">Profile</a>
				<a href="../studentLogin.php" class="mx-2 btn btn-danger">Log Out</a>
			</div>
		</nav>
		<!--=========================================================================== nav bar ===========================================================================-->
		<div class="content p-3">
			<div class="w-50 mx-auto">
				<span id="test3" class="h4 d-block my-3">Upload required documents</span>
					<div id="pendingDiv" class="mx-auto w-100">
						<div class="card mt-3 p-3 text-center">
							<div class="mx-auto">
								<span class="h4">Your Submission Is Pending</span>
							</div>
						</div>
					</div>
					<!--=========================================================================== Required docs ===========================================================================-->
					<div id="uploadDocsDiv" class="mx-auto w-100">
						<form action="submitDocs.php" method="post" enctype="multipart/form-data">

							<div class="card">

								<div class="row justify-items-center my-3">

									<div class="card w-25 mx-auto my-auto">
										<span class="h4 d-block my-3">Indemnity Form</span>
										<div class="card mt-3 p-3">
											<input class="d-block" type="file" id="input_indemnForm" name="input_indemnForm" required>
										</div>
									</div>

									<div class="card w-25 mx-auto my-auto">
										<span class="h4 d-block my-3">Parents Acceptance Form</span>
										<div class="card mt-3 p-3">
											<input class="d-block" type="file" id="input_parentsForm" name="input_parentsForm" required>
										</div>
									</div>

									<div class="card w-25 mx-auto my-auto">
										<span class="h4 d-block my-3">Company Acceptance Letter</span>
										<div class="card mt-3 p-3">
											<input class="d-block" type="file" id="input_companyLtr" name="input_companyLtr" required>
										</div>
									</div>
									
								</div>
								<div class="row">
									<input id="docsSubmit" class="w-50 mb-3 mx-auto btn btn-primary" type="submit" value="Submit">
								</div>

							</div>

						</form>
					</div>
					<!--=========================================================================== MONTHLY REPORT 1 ===========================================================================-->
					<div id="uploadMR1div" class="mx-auto w-100">
						<span class="h4 d-block my-3">Submit Monthly Report 1</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== MONTHLY REPORT 2 ===========================================================================-->
					<div id="uploadMR2div" class="mx-auto w-100">
						<span class="h4 d-block my-3">Submit Monthly Report 2</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== MONTHLY REPORT 3 ===========================================================================-->
					<div id="uploadMR3div" class="mx-auto w-100">
						<span class="h4 d-block my-3">Submit Monthly Report 3</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== FNAL REPORT ===========================================================================-->
					<div id="uploadFRdiv" class="mx-auto w-100">
						<span class="h4 d-block my-3">Submit Final Report</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== View Grade ===========================================================================-->
					<div id="viewGradeDiv" class="mx-auto w-100">
						<span class="h4 d-block my-3">View Grade</span>
						<div class="card mt-3 p-3">
							<span id="span_grade" class="h5">Congratulations on completion of internship</span>
							<span class="h6">Your Grade : </span>
						</div>
					</div>
				</div>
			</div>
	</body>
    <script>
        // Check if the "error" parameter exists in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            const errorMessage = decodeURIComponent(urlParams.get('error'));
            alert(errorMessage);
        }

		var indemnStatus = '<?php echo $indemnityStatus; ?>';
		var parentsStatus = '<?php echo $parentsStatus; ?>';
		var acceptanceStatus = '<?php echo $acceptanceStatus; ?>';
		var mr1Status = '<?php echo $acceptanceStatus; ?>';
		var mr2Status = '<?php echo $acceptanceStatus; ?>';
		var mr3Status = '<?php echo $acceptanceStatus; ?>';
		var r1Status = '<?php echo $r1Status; ?>';
		var r2Status = '<?php echo $r2Status; ?>';
		var r3Status = '<?php echo $r3Status; ?>';
		var frStatus = '<?php echo $frStatus; ?>';
		var grade = '<?php echo $grade; ?>';

		if(grade == "empty"){
			document.getElementById('viewGradeDiv').style.display = 'none';
			if(indemnStatus == "empty" || parentsStatus == "empty" || acceptanceStatus == "empty"){
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';
				document.getElementById('pendingDiv').style.display = 'none';
			}
			else if(indemnStatus == "pending" ||parentsStatus == "pending" || acceptanceStatus == "pending"){
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';
				document.getElementById('uploadDocsDiv').style.display = 'none';
			}
			else if(mr1Status == "empty"){
				document.getElementById('uploadDocsDiv').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';
				document.getElementById('pendingDiv').style.display = 'none';
			}
			else if(mr2Status == "empty"){
				document.getElementById('uploadDocsDiv').style.display = 'none';
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';
				document.getElementById('pendingDiv').style.display = 'none';
			}
			else if(mr3Status == "empty"){
				document.getElementById('uploadDocsDiv').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';
				document.getElementById('pendingDiv').style.display = 'none';
			}
			else if(frStatus == "empty"){
				document.getElementById('uploadDocsDiv').style.display = 'none';
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('pendingDiv').style.display = 'none';
			}
		}
		else{
				document.getElementById('uploadDocsDiv').style.display = 'none';
				document.getElementById('uploadMR1div').style.display = 'none';
				document.getElementById('uploadMR2div').style.display = 'none';
				document.getElementById('uploadMR3div').style.display = 'none';
				document.getElementById('uploadFRdiv').style.display = 'none';

				if(grade != "empty"){
					document.getElementById('pendingDiv').style.display = 'none';
					document.getElementById('span_grade').innerHTML = "Your Grade : " + grade;
				}
				else{
					document.getElementById('viewGradeDiv').style.display = 'none';
				}

		}


    </script>
</html>
