<?php 
session_start();
$id = $_SESSION['userid'];
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
				<div class="card mt-3 p-3">
					<!--=========================================================================== MONTHLY REPORT 1 ===========================================================================-->
					<div id="uploadMR1div" class="mx-auto">
						<span class="h4 d-block my-3">Submit Monthly Report 1</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== MONTHLY REPORT 2 ===========================================================================-->
					<div class="mx-auto">
						<span class="h4 d-block my-3">Submit Monthly Report 2</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== MONTHLY REPORT 3 ===========================================================================-->
					<div class="mx-auto">
						<span class="h4 d-block my-3">Submit Monthly Report 3</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== FNAL REPORT ===========================================================================-->
					<div class="mx-auto">
						<span class="h4 d-block my-3">Submit Final Report</span>
						<div class="card mt-3 p-3">
							<form action="">
								<input class="d-block" type="file" id="input_submitFile" name="filename" required>
								<input class="d-block mt-3" type="submit" id="input_submitDocs" value="Submit Documents">
							</form>	
						</div>
					</div>
					<!--=========================================================================== FNAL REPORT ===========================================================================-->
					<div class="mx-auto">
						<span class="h4 d-block my-3">View Grade</span>
						<div class="card mt-3 p-3">
							<span class="h5">Congratulations on completion of internship</span>
							<span class="h6">Your Grade : </span>
						</div>
					</div>
				</div>
				</div>
			</div>
	</body>
    <script>
        // Check if the "error" parameter exists in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('id')) {
			const currentId = decodeURIComponent(urlParams.get('id'));
			document.getElementById('hiddenField').innerHTML = currentId;

        }
    </script>
</html>
