<?php  
session_start();
include 'connect.php'; 
$_SESSION['from_url']=$_SERVER['REQUEST_URI'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>CONTACT US</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/contactus.css">

</head>
<body style="background: rgb(245,246,250); overflow-x: hidden;">

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
					<a class="nav-link" href="aboutus.php">ABOUT US <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item active">
					<a class="nav-link" href="contactus.php">CONTACT US <span
						class = "sr-only">(current)
					</span></a>
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

	
	<div class="row contactDiv" >
		<div class="col-6 contactimg">
			<img src="images/car/contact_us.png">
		</div>
		<div class="col-6 contactdata" >
			We provide quality 5 Star rated car insurance at a low cost to you. Our  call centres are full of friendly staff who provide great customer service. Feel free to reach out to us anytime over any query.
			<br>
			<br>
			<i class="fa fa-phone"></i>
			+91 8073280942 / +91 9699161951
			<br>
			<br>
			<i class="fa fa-envelope"></i>
			 carinsurancesupport@gmail.com

			<br>
			<br>
			<i class="fa fa-map-marker"></i>
			<a href="https://www.google.com/maps/dir/13.0069214,74.7951221/Reliance+General+Insurance+Company+Limited,+301-303,+apple+plaza+building,+Above+HDFC+bank,+Tulsi+Pipe+Rd,+Dadar+West,+Mumbai,+Maharashtra+400028/@16.0232073,71.7368403,7z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3be7cedb000001d7:0x987b31cbdda0acc3!2m2!1d72.8399445!2d19.0167268">Click here for Company Location </a>
			
		</div>
	</div>



</body>
</html>	