<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Courses - Applicant Registration</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
			font-size: 15px;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.registration-box {
			background: #f7edeb;
			border-radius: 10px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			padding: 20px;
			width: 500px;
		}

		.registration-logo {
			font-size: 28px;
			font-weight: bold;
			text-align: center;
			padding: 20px 0;
			border-bottom: 1px solid #eee;
		}

		.registration-box-body {
			padding: 30px;
			background: #f7edeb;
		}

		.form-control {
			border-radius: 4px;
		}

		.btn-admin {
			position: fixed;
			bottom: 20px;
			right: 20px;
			background-color: #8c0a0a;
			color: #fff;
			border: none;
			border-radius: 30px;
			padding: 10px 20px;
			font-size: 16px;
			cursor: pointer;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
			transition: all 0.3s ease;
		}

		.form-group label {
			font-weight: bold;
		}
	</style>
</head>

<body>
	<div class="registration-box">
		<div class="registration-logo">
			<b>Applicant Registration</b>
		</div>

		<div class="registration-box-body">
			<p class="registration-box-msg">Fill in the details to register.</p>

			<form action="applicant_add.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="firstname">First Name</label>
					<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
				</div>
				<div class="form-group">
					<label for="lastname">Last Name</label>
					<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<button type="submit" class="btn btn-primary btn-block" style="background-color:#8c0a0a" name="add">
							<i class="fa fa-save"></i> Complete Registration
						</button>
					</div>
				</div>
			</form>
		</div>

		<?php
		if (isset($_SESSION['error'])) {
			echo "
        <div class='callout callout-danger text-center mt-3'>
        <p>" . $_SESSION['error'] . "</p> 
        </div>";
			unset($_SESSION['error']);
		}
		?>
	</div>

	<a href="login.php" class="btn btn-success btn-admin"><i class="fa fa-user"></i> Already Registered? Login Here</a>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
