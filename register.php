<?php 

session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Car Insurance</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- <link rel="stylesheet" type="text/css" href="main.css"> -->
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body style="background-color: #dedede">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
		

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="progress.php">CHECK ELIGIBILITY</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="aboutus.php">ABOUT US</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="contactus.php">CONTACT US</a>
				</li>

				<?php  
				
				if(isset($_SESSION['admin'])){
					echo "
					<li class='nav-item'>
						<a class='nav-link' href='adminpage.php'>Admin</a>
					</li>
					";
				}

				?>

			<?php 
			if (isset($_SESSION['username'])) {

				$var = $_SESSION['username'];

				echo "

				<li class='nav-item dropdown'  >
					<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
						$var
					</a>
					<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
						<a class='dropdown-item' href='customer.php'>Profile</a>
						<div class='dropdown-divider'></div>
						<a class='dropdown-item' href='claims.php''>Make a claim</a>
						<div class='dropdown-divider'></div>
						<a class='dropdown-item' href='myclaims.php''>My claims</a>
						<div class='dropdown-divider'></div>
						<a class='dropdown-item' href='myplans.php''>My Plans</a>
						<div class='dropdown-divider'></div>

						<a class='dropdown-item' href='logout.php''>Sign Out</a>
						
					</div>
				</li>
				";
			} ?>
				
			</ul>

			<?php
				if (!isset($_SESSION['username'])) {
					echo "
					<a href='register.php'>
					<button class='btn btn-primary my-2 my-sm-0 br-5' type='submit'>&nbsp;&nbsp;Sign In&nbsp;&nbsp;</button>
					</a>";
				}

			 ?>
		</div>
	</nav>


	<ul class="nav nav-pills mb-3 py-2" id="pills-tab" role="tablist" style="padding-left: 38% ">
		<li class="nav-item">
			<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Log In</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

			<div id="loginForm" class="bg-grey2 br-10 mt-5" style="background: rgba(265,256,256,0.48);
			border: 1px solid white; border-radius: 10px;">
			<h3> Login Form </h3>

			<form class="needs-validation py-3" action="PHPlogin.php" method="POST">
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label for="email">Email</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text leftbr-5" id="email">@</span>
							</div>
							<input type="email" class="form-control" name="login_email" id="email" placeholder="S@mail.com" aria-describedby="email" required 		
							style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3">
						<label for="pass">Password</label>
						<div class="input-group">
							<input type="password" class="form-control br-5" name="login_pass" id="pass" placeholder="Password" aria-describedby="pass" required
							style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

						</div>
					</div>
				</div>

				<button class="btn btn-primary rightbr-5 leftbr-5" type="submit">Login</button>
			</form>				
		</div>
	</div>

	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

		<div id="regForm" class="bg-grey2 br-10 mt-5" style="background: rgba(265,256,256,0.48);
		border: 1px solid white; border-radius: 10px;">

		<h3 style="padding-top: 10px"> Registeration Form </h3>

		<form class="needs-validation py-3" method="POST" action="PHPregister.php">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="validationTooltip01">First name</label>
					<input type="text" class="form-control" name="fname" id="validationTooltip01" placeholder="First name" required>

				</div>
				<div class="col-md-4 mb-3">
					<label for="validationTooltip02">Last name</label>
					<input type="text" class="form-control" name="lname" id="validationTooltip02" placeholder="Last name" required>

				</div>
			</div>

			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="lisence">Driver Lisence No.</label>
					<div class="input-group">
						<input type="text" class="form-control" name="lisence" id="lisence" placeholder="Lisence no." aria-describedby="lisence" required 		
						style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

					</div>
				</div>
			</div>



			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="email">Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text leftbr-5" id="email">@</span>
						</div>
						<input type="email" class="form-control" name="email" id="email" placeholder="S@mail.com" aria-describedby="email" required 		
						style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="phone">Phone No.</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text leftbr-5" id="phone">+91</span>
						</div>
						<input type="tel" class="form-control" name="phone" id="phone" placeholder="9876543210" 
						pattern="[0-9]{10}" maxlength="10" minlength="10" 
						required 		
						style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

					</div>
				</div>

			</div>
			<div class="form-row">
				<div class="col-md-5 mb-3">
					<label for="pass">Password</label>
					<div class="input-group">
						<input type="password" class="form-control br-5" name="pass" id="pass" placeholder="Password" aria-describedby="pass" required
						style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

					</div>
				</div>
			</div>

					<!-- <div class="form-row">
						<div class="col-md-5 mb-3">
							<label for="cpass">Confirm Password</label>
							<div class="input-group">
								<input type="password" class="form-control br-5" id="cpass" placeholder="Password" aria-describedby="cpass" required
								style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">
								<div class="invalid-tooltip">
									Please choose a unique and valid username.
								</div>
							</div>
						</div>
					</div> -->
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="validationTooltip03">City</label>
							<input type="text" class="form-control" name="city" id="validationTooltip03" placeholder="City" required>
							
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationTooltip05">Pin</label>
							<input type="text" class="form-control" name="pin" id="validationTooltip05" placeholder="Pin" maxlength="6" minlength="6" required>
							
						</div>
					</div>
					<button class="btn btn-primary rightbr-5 leftbr-5" type="submit">Submit form</button>
				</form>
			</div>		
		</div>
	</div>
	
	
</body>
</html>


