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
			<a href="./staffDashboard.php" class="h4 text-decoration-none">Staff Dashboard</a>
            <div class="">
                <ul class="nav-bar-nav list-group list-group-horizontal list-unstyled">
                    <li class="mx-2 nav-item"><a href="./staffDashboard.php" class="text-decoration-none text-light">Current Session</a></li>
                    <li class="mx-2 nav-item"><a href="./staffUpcomingSession.php" class="text-decoration-none text-light">Upcoming Session</a></li>
                </ul>
            </div>
			<div>
				<a href="./staffProfile.php" class="mx-2 btn btn-primary">Profile</a>
				<a href="../staffLogin.php" class="mx-2 btn btn-danger">Log Out</a>
			</div>
		</nav>
		<!--=========================================================================== nav bar ===========================================================================-->
		<div class="content p-3">
			<div class="w-50 mx-auto">
				<span class="h4 d-block my-3">User Profile</span>
                <form action="">
                    <div class="card mt-3 p-3">
                        <div class="row">
                            <div class="mb-4">
                                <img class="w-25" src="./photos/profilepic.jpg" alt="">
                                <input class="d-block" type="file" id="input_submitFile" name="filename" required>
                            </div>
                            <div class="mb-4">
                                <label class="d-block mb-1" for="tb_email">E-mail</label>
                                <input class="d-block w-100 form-control" type="text" name="tb_email" id="tb_email" value="abc@email.com" required />
                            </div>
                            <div class="mb-4">
                                <label class="d-block mb-1" for="tb_name">Name</label>
                                <input class="d-block w-100 form-control" type="text" name="tb_name" id="tb_name" placeholder="Enter Name" required value="Cry Cry Cry"/>
                            </div>
                            <div class="">
                                <a href="./staffProfile.php" class="btn btn-danger w-25">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-success w-25">
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	<?php

		session_start();
		$id = 1;

		$email = "Unable to Load Data";
		$name = "Unable to Load Data";
		require("../sql/connectDB.php");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}    

		$getUserQuery = "SELECT * FROM Staff WHERE staffId = '$id'";

		$getUserResult = $conn->query($getUserQuery);
		if($getUserResult->num_rows > 0){
			$row = $getUserResult->fetch_assoc();
			$email = $row["email"];
			$name= $row["name"];
		}
		$conn->close();

		$loadscript= "
			document.getElementById('tb_email').value = '$email';
			document.getElementById('tb_name').value = '$name';
		";

		echo "<script>$loadscript</script>";
	?>
	</body>
</html>
