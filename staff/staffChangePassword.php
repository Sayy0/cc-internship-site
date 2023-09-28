
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Change Password</title>
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
                <form action="staffChangePwProcess.php" method="post">
                    <div class="card mt-3 p-3">
                        <div class="row">
                            <div class="mb-4 col">
                                <label class="d-block mb-1" for="tb_opw">Old Password</label>
                                <input class="d-block w-100 form-control" type="password" name="tb_opw" id="tb_opw" placeholder="Current Password" required />
                            </div>
                            <div class="mb-4">
                                <label class="d-block mb-1" for="tb_npw">New Password</label>
                                <input class="d-block w-100 form-control" type="password" name="tb_npw" id="tb_npw" placeholder="New Password" required />
                            </div>
                            <div class="mb-4">
                                <label class="d-block mb-1" for="tb_cpw">Confirm Password</label>
                                <input class="d-block w-100 form-control" type="password" name="tb_cpw" id="tb_cpw" placeholder="Confirm Password" required />
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
	</body>
</html>
