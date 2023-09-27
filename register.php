<?php 
// Start a session to access the error message
session_start();

// Display the error message as an alert using JavaScript
if (isset($_SESSION['errMsg'])) {
    echo "<script>alert('{$_SESSION['error']}');</script>";
    // Clear the error message from the session
    unset($_SESSION['errMsg']);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Register</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
	</head>
	<body class="bg-info">
		<div class="container">
			<div class="row pt-5 py-5">
				<div class="container pb-5">
					<span class="display-3 text-white">Register Internship Session</span>
				</div>
				<div class="card p-5 mx-auto w-50">
					<span class="h4">Student Register</span>
					<form class="d-block m-3" method="POST" action="./registerProcess.php">
						<div class="mb-4">
							<label class="d-block mb-1" for="tb_email">E-mail</label>
							<input class="d-block w-100 form-control" type="text" name="tb_email" id="tb_email" placeholder="Enter Email" required />
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="tb_name">Name</label>
							<input class="d-block w-100 form-control" type="text" name="tb_name" id="tb_name" placeholder="Enter Name" required />
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="tb_phoneNo">Phone No.</label>
							<input class="d-block w-100 form-control" type="text" name="tb_phoneNo" id="tb_phoneNo" placeholder="012-34567890" required />
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="ddl_gender">Gender</label>
							<select class="d-block w-100 form-select" requried name="ddl_gender" id="ddl_gender">
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="ddl_programme">Programme</label>
							<select class="d-block w-100 form-select" requried name="ddl_programme" id="ddl_programme">
								<option value="DCS">Diploma In Computer Science</option>
								<option value="DIT">Diploma In Information Technology</option>
								<option value="RDS">Degree In Data Science</option>
								<option value="RSW">Degree In Software Engineering</option>
							</select>
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="ddl_session">Session</label>
							<select class="d-block w-100 form-select" requried name="ddl_session" id="ddl_session">
								<option value="202310">October 2023</option>
								<option value="202401">January 2024</option>
								<option value="202404">April 2024</option>
							</select>
						</div>
						<div class="mb-4">
							<label class="d-block mb-1" for="tb_pw">Password</label>
							<input class="d-block w-100 form-control" type="password" name="tb_pw" id="tb_pw" required placeholder="Password" />
						</div>
						<div class="">
							<label class="d-block mb-1" for="tb_cpw">Confirm Password</label>
							<input class="d-block w-100 form-control" type="password" name="tb_cpw" id="tb_cpw" required placeholder="Confirm Password" />
						</div>
						<div class="row justify-content-end mt-1">
							<a href="./index.php" class="w-25 text-end">Student Login</a>
						</div>
						<div class="row justify-content-end mt-4">
							<input class="btn btn-primary" type="submit" value="Register" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
