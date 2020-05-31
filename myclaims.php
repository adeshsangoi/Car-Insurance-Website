<?php  

session_set_cookie_params(0);
session_start();
include 'connect.php';
$_SESSION['from_url']=$_SERVER['REQUEST_URI'];



$temp =$_SESSION['lisenceNo'];
$qry="SELECT * FROM claims where lisense = '$temp' ";
$result=mysqli_query($conn,$qry);

?>

<!DOCTYPE html>
<html>
<head>
	<title>OFFERS Car Insurance</title>
	

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/offers.css">

</head>
<style>
	#but{
		background: DodgerBlue;
		cursor: auto;
	}
</style>
<body style="max-width: 100%; overflow-x: hidden;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
		

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="progress.php">CHECK ELIGIBILITY <span class="sr-only"></span></a>
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
<br>
<br>
<br>


	<div style="">
		<div class="row">
				<div class="offersdiv">
					<div>
						<?php 

						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$policy_no=$row['insurance_id'];
								$description=$row['description'];
								$amount=$row['amount'];
								$status=$row['status'];

												
								echo"
								<form method='POST' >
									<div class='row'>
										
										<div class='col-3'>
											<h4>IMAGE</h4>
										</div>
										<div class='col-3'>
											<h4>POLICY NUMBER</h4>
										</div>
										<div class='col-3'>
											<h4>DESCRIPTION</h4>
										</div>
										<div class='col-3'>
											<h4>AMOUNT CLAIMED</h4>
										</div>

								";
								

								echo "<div class='col-3'>";

								echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).' "/ width="250px" height = "250px">';

								echo"											
										</div>
										
										<div class='col-3'>
											$policy_no
										</div>
										<div class='col-3'>
											$description
										</div>
										<div class='col-3'>
											Rs. $amount
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3 py-2'>
											
										<button type='submit' id='but' name = 'sub' class='btn btn-success br-5'>&nbsp;&nbsp;$status&nbsp;&nbsp;</button>
										</div>


									</div>
									<form>
										";
									}
								}

								
								?>
							</div>

						</div>


					</div>
				</div>
			</div>
		</body>
		</html>