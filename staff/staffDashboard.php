
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
                    <li class="mx-2 nav-item"><a href="./staffDashboard.php" class="text-decoration-none text-light">To Grade</a></li>
                    <li class="mx-2 nav-item"><a href="./staffUpcomingSession.php" class="text-decoration-none text-light">Check Submission Documents</a></li>
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
                <span class="h3 d-block py-4">Current Session</span>
				<table class="table table-striped table-bordered">
					<thead class="table-dark text-light">
						<tr>
							<th>Student ID</th>
							<th>Name</th>
							<th>Report 1</th>
							<th>Report 2</th>
							<th>Report 3</th>
							<th>Final Report</th>
							<th>Grade</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							require("./sql/connectDB.php");

							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}    
							$getListQuery = "SELECT * FROM Internship";

							$getListResult = $conn->query($getListQuery);

							if($getListResult->num_rows > 0){
								while($row = $getListResult->fetch_assoc()){
									$internshipId = $row['internshipId'];
									$studentId = $row['studentId'];
									$r1Status = $row['report1Status'];
									$r1FP= $row['report1FP'];
									$r2Status = $row['report2Status'];
									$r2FP= $row['report2FP'];
									$r3Status = $row['report3Status'];
									$r3FP= $row['report3FP'];
									$frStatus = $row['finalReportStatus'];
									$frFP= $row['finalReportFP'];
									$grade = $row['grade'];
									$studentName = "NULL";

									$studentQuery = "SELECT * FROM Student WHERE 'studentId' = '$studentId' ";	
									$studentResult = $conn->query($studentQuery);
									if($studentResult->num_rows>0){
										$studrow = $studentResult->fetch_assoc();
										$studentName = $row["studentName"];
									}

									echo "<tr>";
									echo "<td>" . $studentId . "</td>";
									echo "<td>" . $studentName . "</td>";
									if($r1FP != "empty"){
										echo "<td><a href='" . $r1FP . "' target='_blank' class='text-danger'>View File</a></td>";
									}
									else{
										echo "<td>Not Submitted</td>";
									}
									if($r2FP != "empty"){
										echo "<td><a href='" . $r2FP . "' target='_blank' class='text-danger'>View File</a></td>";
									}
									else{
										echo "<td>Not Submitted</td>";
									}
									if($r3FP != "empty"){
										echo "<td><a href='" . $r3FP . "' target='_blank' class='text-danger'>View File</a></td>";
									}
									else{
										echo "<td>Not Submitted</td>";
									}
									if($frFP != "empty"){
										echo "<td><a href='" . $frFP . "' target='_blank' class='text-danger'>View File</a></td>";
										if($grade == "empty"){
										echo "
											<td>
												<form method='post' action='gradeProcess.php'>
													<input type='text' id='tb_id' value='$internshipId' hidden/>
													<select class='d-block w-100 form-select mb-2' requried name='ddl_grade' id='ddl_grade'>
														<option value='A'>A</option>
														<option value='A-'>A-</option>
														<option value='B'>B</option>
														<option value='B-'>B-</option>
														<option value='C'>C</option>
														<option value='C-'>C-</option>
														<option value='F'>Fail</option>
													</select>
													<input class='btn btn-success' type='submit' value='Grade'/></td>
												</form>
											</td>
										";	
										}
										else{
											echo "<td class='text-center'><span>$grade</span></td>";
										}
									}
									else{
										echo "<td>Not Submitted</td>";
										echo "<td class='text-center'><span>-</span></td>";
									}


									echo "</tr>";
								}

							}


						?>

						<tr>
							<td>2206976</td>
							<td>Tan Wei Jian</td>
							<td><a href="">View Report 1</a></td>
							<td><a href="">View Report 2</a></td>
							<td><a href="">View Report 3</a></td>
							<td><a href="">View Final Report</a></td>
							<td class="text-center"><span>A</span></td>
						</tr>
						<tr>
							<td>2206952</td>
							<td>Chung Chee You</td>
							<td><a href="">View Report 1</a></td>
							<td><span class="text-warning">Not submitted</span></td>
							<td><span class="text-warning">Not submitted</span></td>
							<td><span class="text-warning">Not submitted</span></td>
							<td class="text-center">
								<select class="d-block w-100 form-select mb-2" requried name="ddl_grade" id="ddl_grade">
									<option value="A">A</option>
									<option value="A-">A-</option>
									<option value="B">B</option>
									<option value="B">B-</option>
									<option value="C">C</option>
									<option value="C-">C-</option>
									<option value="F">Fail</option>
								</select>
								<a class="btn btn-primary" href="">Grade</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
