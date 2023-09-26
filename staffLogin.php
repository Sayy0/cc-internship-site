<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
	</head>
	<body class="bg-secondary">
		<div class="container">
			<div class="row pt-5 py-5">
				<div class="container pb-5">
					<span class="display-3 text-white">Staff Login</span>
				</div>
				<div class="card p-5 mx-auto w-50">
					<span class="h4">Staff Login</span>
					<form class="d-block m-3" action="./internshipSubmission.html">
						<div class="mb-4">
							<label class="d-block mb-1" for="tb_email">E-mail</label>
							<input class="d-block w-100 form-control" type="text" name="tb_email" id="tb_email" placeholder="Enter Email" required />
						</div>
						<div class="">
							<label class="d-block mb-1" for="tb_pw">Password</label>
							<input class="d-block w-100 form-control" type="password" name="tb_pw" id="tb_pw" required placeholder="Password" />
						</div>
						<div class="row justify-content-end mt-1">
							<a href="./index.php" class="w-25 text-end">Student Login</a>
						</div>
						<div class="row justify-content-end mt-4">
							<input class="btn btn-primary" type="button" value="Login" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
