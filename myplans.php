<?php  

session_set_cookie_params(0);
session_start();
include 'connect.php';
$_SESSION['from_url']=$_SERVER['REQUEST_URI'];


$temp =$_SESSION['lisenceNo'];
$qry="SELECT * FROM plans where lisense = '$temp' and status=1 ";
$result=mysqli_query($conn,$qry);

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
	<link rel="stylesheet" type="text/css" href="css/offers.css">

</head>
<style>
	#but{
		background: DodgerBlue;
		cursor: auto;
	}

	#but2{
		background: rgb(58, 186, 91);
		}

	#but4{
		cursor: pointer;
		
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
						$temp = 0;
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$temp += 1;
								$pid=$row['plan_id'];
								$name=$row['plan_name'];
								$tenure=$row['tenure'];
								$premium=$row['premium'];
								$total_cover=$row['total_cover'];
								$temp2 = $row['payment_status'];

												
								echo"
								<form method='POST' action='finalpage4.php?id=$pid' >
									<div class='row'>
										
										
										<div class='col-3'>
											<h3>PLAN NAME</h5>
										</div>
										<div class='col-3'>
											<h3>RISK COVER</h5>
										</div>
										<div class='col-3'>
											<h3>PREMIUM</h5>
										</div>
										<div class='col-3'>
											<h3>TENURE</h5>
										</div>

								";
								

								echo "
										
										<div class='col-3'>
											$name
										</div>
										<div class='col-3'>
											Rs. $total_cover
										</div>
										<div class='col-3'>
											Rs. $premium
										</div>
										<div class='col-3'>
										 $tenure years
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										";
									
									if ($temp2 != 1)		
									{
										echo "
										<div class='col-3 py-2'>
										<button style = 'margin-left:300px;' type='submit' id='but' onclick = 'return false'  name = 'sub' class='btn btn-success br-5'>&nbsp;&nbsp;
										PAYMENT PENDING
										&nbsp;&nbsp;</button>
										</div>";

										echo "
										<div class='col-3 py-2'>
										<button style = 'margin-top:50px; margin-left:15px;' type='submit' id='but4'   name = 'sub' class='btn btn-success br-5'>&nbsp;&nbsp;
										CANCEL
										&nbsp;&nbsp;</button>
										</div>";
									}

									else
									{
										echo "
										<div class='col-3 py-2'>
										<button style = 'margin-left:275px;' type='submit' onclick = 'return false' id='but' name = 'sub' class='btn btn-success br-5'>&nbsp;&nbsp;
										PAYMENT SUCCESSFULL
										&nbsp;&nbsp;</button>
										</div>";

										echo "

										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3 py-2'>
										<button style = 'margin-left:275px;' type='submit' id='but2' name = 'sub' class='btn btn-success br-5'>&nbsp;&nbsp;
										RENEW
										&nbsp;&nbsp;</button>
										</div>";
									}



									echo "
									</div>
									<form>
										";
									}
								}

								if($temp == 0)
									echo "NO PLANS BOUGHT BY YOU";
								?>
							</div>

						</div>


					</div>
				</div>
			</div>
		</body>
		</html>