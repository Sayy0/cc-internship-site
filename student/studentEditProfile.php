
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
				<span class="h4 d-block my-3">User Profile</span>
                <form action="studentEditProcess.php" method="post" enctype="multipart/form-data">
                    <div class="card mt-3 p-3">
                        <div class="row">
                            <!--
                            <div class="mb-4">
                                <img class="w-25" src="./photos/profilepic.jpg" alt="">
                                <input class="d-block" type="file" id="input_submitFile" name="filename" required>
                            </div>
-->
                            <div class="mb-4">
                                <label class="d-block mb-1" for="tb_name">Name</label>
                                <input class="d-block w-100 form-control" type="text" name="tb_name" id="tb_name" placeholder="Enter Name" value="Cry Cry Cry" required />
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
                                <select class="d-block w-100 form-select" requried name="ddl_programme" id="ddl_programme" >
                                    <option value="DCS">Diploma In Computer Science</option>
                                    <option value="DIT">Diploma In Information Technology</option>
                                    <option value="RDS">Degree In Data Science</option>
                                    <option value="RSW">Degree In Software Engineering</option>
                                </select>
                            </div>
                            <div class="">
                                <a href="./studentProfile.php" class="btn btn-danger w-25">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-success w-25">
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	<?php

		session_start();
		$studentId = $_SESSION['userid'];

		$email = "Unable to Load Data";
		$name = "Unable to Load Data";
		$phoneNo = "Unable to Load Data";
		$gender = "Unable to Load Data";
		$programme = "Unable to Load Data";
		require("../sql/connectDB.php");

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}    

		$getUserQuery = "SELECT * FROM Student WHERE studentId = '$studentId'";

		$getUserResult = $conn->query($getUserQuery);
		if($getUserResult->num_rows > 0){
			$row = $getUserResult->fetch_assoc();
			$email = $row["email"];
			$name= $row["studentName"];
			$phoneNo = $row["phoneNo"];
			$gender = $row["gender"];
			$programme = $row["programme"];
		}
		$conn->close();

		$loadscript= "
			document.getElementById('tb_name').value = '$name';
			document.getElementById('tb_phoneNo').value = '$phoneNo';
			for(var i = 0; i < document.getElementById('ddl_gender').options.length; i++){
				var option = document.getElementById('ddl_gender').options[i];
				if(option.value == '$gender'){
					document.getElementById('ddl_gender').selectedIndex = i;
					break;
				}
			}
			for(var i = 0; i < document.getElementById('ddl_programme').options.length; i++){
				var option = document.getElementById('ddl_programme').options[i];
				if(option.value == '$programme'){
					document.getElementById('ddl_programme').selectedIndex = i;
					break;
				}
			}
		";

		echo "<script>$loadscript</script>";
	?>
	</body>
    <script>
        // Check if the "error" parameter exists in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            const errorMessage = decodeURIComponent(urlParams.get('error'));
            alert(errorMessage);
        }
        if (urlParams.has('success')) {
            const errorMessage = decodeURIComponent(urlParams.get('success'));
            alert(errorMessage);
        }
    </script>
</html>
