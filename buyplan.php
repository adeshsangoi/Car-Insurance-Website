<?php 

session_start();
include 'connect.php';

$var = $_GET['id1'];
$_SESSION['buyplan'] = $var;
$qry="SELECT * FROM plans WHERE plan_id='$var' ";
$resultmain=mysqli_query($conn,$qry);

$result = mysqli_fetch_assoc($resultmain);


if (!isset($_SESSION['username'])){
	header('location:register.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Car Insurance</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/buyplan.css">

	<style type="text/css">
		#buyForm{
			margin: auto auto;
			width: fit-content;
			padding-left: 50px;
			padding-right: 50px;
			padding-top: 20px;
			padding-bottom: 25px;
			background: rgba(265,256,256,0.48);
			border: 1px solid white;
		}
	</style>
</head>

<body style="max-width: 100%; overflow-x: hidden;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="progress.php">CHECK ELIGIBILITY <span class="sr-only">(current)</span></a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="aboutus.php">ABOUT US </a>
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
				if (!isset($_SESSION['lisenceNo'])) {
					echo "
					<a href='register.php'>
					<button class='btn btn-primary my-2 my-sm-0 br-5' type='submit'>&nbsp;&nbsp;Sign In&nbsp;&nbsp;</button>
					</a>";
				}

			 ?>
		</div>
	</nav>
	<div id="buyForm" class="bg-grey2 br-10 mt-5" style="background: rgba(265,256,256,0.48);
	border: 1px solid white; border-radius: 10px;">
	<h3 style="padding-top: 50px;"> Insurance Plan Details
	</h3>

	<form class="needs-validation py-3" action="finalpage.php" method="POST">
		<div class="form-row">
			<div class="col-md-12 mb-3">
				<label for="email">Plan Name</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text leftbr-5" id="email">

						</span>
						<?php 
						echo "
						<input type='text' class='form-control' name='login_email' id='email' aria-describedby='email' readonly value='".$result['plan_name']."'		
						style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
						";
						?>

					</div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-12 mb-3">
				<label for="email">Plan Cover</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text leftbr-5" id="email">
						</span>
						<?php 

						echo "
						<input type='text' class='form-control' name='login_email' id='email' aria-describedby='email' readonly value='".$result['total_cover']."'		
						style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
						";
						?>
					</div>

				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-12 mb-3">
				<label for="email">Plan Premium</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text leftbr-5" id="email">
						</span>
						<?php 

						echo "
						<input type='text' class='form-control' name='login_email' id='email' aria-describedby='email' readonly value='".$result['premium']."'		
						style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
						";
						?>
					</div>

				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-12 mb-3">
				<label for="email">Plan Tenure</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text leftbr-5" id="email">
						</span>
						<?php 

						echo "
						<input type='text' class='form-control' name='login_email' id='email' aria-describedby='email' readonly value='".$result['tenure']."'		
						style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
						";

						?>
					</div>

				</div>
			</div>
		</div>



		<button class="btn btn-primary w150 rightbr-5 leftbr-5" name = "plan" type="submit">BUY</button>

		

	</form>				
</div>

	
</body>
</html>
