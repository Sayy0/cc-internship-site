

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
			<div class="w-75 mx-auto">
                <span class="h3 d-block py-4">Upcoming Session</span>
				<table class="table table-striped table-bordered">
					<thead class="table-dark text-light">
						<tr>
							<th>Student ID</th>
							<th>Name</th>
							<th>Indemnity</th>
							<th>Parents Acknowledgement</th>
							<th>Acceptance Letter</th>
							<th>Accept</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>2206963</td>
							<td>Lee Xi Qian</td>
							<td><a href="">View Document</a></td>
							<td><a href="">View Document</a></td>
							<td><a href="">View Document</a></td>
							<td class="text-center"><a class="btn btn-success" href="">Accept</a></td>
						</tr>
						<tr>
							<td>2206977</td>
							<td>Tneoh Bee Lun</td>
							<td><a href="">View Document</a></td>
							<td><a href="">View Document</a></td>
							<td><a href="">View Document</a></td>
							<td class="text-center"><span class="btn btn-outline-success" href="">Accepted</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
