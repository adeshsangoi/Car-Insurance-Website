<?php  

session_set_cookie_params(0);
session_start();
include 'connect.php';
$_SESSION['from_url']=$_SERVER['REQUEST_URI'];

if (isset($_POST['Finalreg_year'])) {
	$regYr=$_POST['Finalreg_year'];
	$_SESSION['regYr']=$regYr;
}

$var = $_SESSION['lisenceNo'];
$qry="SELECT * FROM plans where lisense = '$var' ";
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

	<div style="">
		<div class="row">
			<div class="col-4 pr-1">
				<div class="detaildiv br-5">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
							<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
						</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active datadiv py-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							
							<form method="POST" action="offers.php">

								<div id="FinalCarNoDiv" class="row">
									<div class="col-4">
										<label for="Finalcarno">Car Number:</label>
									</div  class="col-6">
									<div class="col-6">
										
										<?php
										$CN = $_SESSION['carNo'];
										echo"
										<input type='text' name='Finalcarno' id='Finalcarno' value='".$CN."' readonly required>
										";
										?>

									</div>
									<div class="col-2">
										<a href="progress.php">
											<img src="images/edit.png" height="25" >
										</a>
									</div>
								</div>		
								<br>

								<div id="FinalCarBrandDiv" class="row">
									<div class="col-4">
										<label for="Finalcarbrand">Car Brand:</label>
									</div>
									<div class="col-6">
										
										<?php
										$CB = $_SESSION['carBrand'];
										echo"
										<input type='text' name='Finalcarbrand' id='Finalcarbrand' value='".$CB."' readonly required>
										";

										?>

									</div>
									<div class="col-2">
										<a href="carBrand.php">
											<img src="images/edit.png" height="25" >
										</a>
									</div>
								</div>
								<br>

								<div id="FinalFuelTypeDiv" class="row">
									<div class="col-4">
										<label for="Finalfueltype">Fuel Type:</label>
									</div>
									<div class="col-6">
										
										<?php
										
										$FT = $_SESSION['fuelType'];
										echo"
										<input type='text' name='Finalfueltype' id='Finalfueltype' value='".$FT."' readonly required>
										";

										?>

									</div>
									<div class="col-2">
										<a href="fueltype.php">
											<img src="images/edit.png" height="25" >
										</a>
									</div>
								</div>
								<br>

								<div id="FinalCarModelDiv" class="row">
									<div class="col-4">
										<label for="Finalcarmodel">Car Model:</label>
									</div>
									<div class="col-6">

										<?php
										
										$CM = $_SESSION['carModel'];
										echo"
										<input type='text' name='Finalcarmodel' id='Finalcarmodel' value='".$CM."' readonly required>
										";

										?>

									</div>
									<div class="col-2">
										<a href="carModel.php">
											<img src="images/edit.png" height="25" >
										</a>
									</div>
								</div>
								<br>

								<div id="FinalReg_yearDiv" class="row">
									<div class="col-4">
										<label for="Finalreg_year">Registeration Year:</label>
									</div>
									<div class="col-6">
										<?php
										
										$RY = $_SESSION['regYr'];
										echo"
										<input type='text' name='Finalreg_year' id='Finalreg_year' value='".$RY."'readonly>
										";

										?>

									</div>
									<div class="col-2">
										<a href="RegYEAR.php">
											<img src="images/edit.png" height="25" >
										</a>
									</div>
								</div>
								<br>

								
							</form>

						</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						The car with the mentioned number plate is registered under the name of 
						<?php 
						$var = $_SESSION['username'];
						echo $var;
						?>
						. The description of car brand, model and year of purchase provided by you matches with the description in our database. 
						Keep your car papers ready for verification by our agent.



						</div>
							<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							Car Insurance or motor insurance covers for losses that you might incur if your car gets damaged or stolen. The premium amount of your car insurance is decided on the basis of Insured Declared Value or IDV of the vehicle. If you increase the IDV, the premium rises and if you lower it, the premium reduces. It is important for any policyholder to compare various auto insurance options before going for a car insurance renewal or buying a new policy. You can choose any plan from the shown options to the right and our agent will contact you for further process.
								</div>
							</div>
						</div>
					</div>
					<div class="col-8 px-0">
						<div class="space">	
					<!-- 	asdasdasdads
				</div> -->

				<div class="offersdiv">
					<div>
						<?php 

						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$pid=$row['plan_id'];
								$pname=$row['plan_name'];
								$ppremium=$row['premium'];
								$ptotalcover=$row['total_cover'];
								$ptenure=$row['tenure'];
								$_SESSION['offer'] = $pid;
								
								echo"
								<form method='POST' action='buyplan.php?id=$pid' >
									<div class='row'>
												<div class='col-3'>
											<h5>Plan Name</h5>
										</div>
										<div class='col-3'>
											<h5>Total Cover</h5>
										</div>
										<div class='col-3'>
											<h5>Yearly premium</h5>
										</div>
										<div class='col-3'>
											<h5>Tenure</h5>
										</div>
										<div class='col-3'>
											$pname
										</div>
										<div class='col-3'>
											Rs.$ptotalcover
										</div>
										<div class='col-3'>
											Rs.$ppremium
										</div>
										<div class='col-3'>
											$ptenure years
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3'>
										</div>
										<div class='col-3 py-2'>
											
										
										</div>


						<a style='color:black; margin-left:680px;' href='buyplan.php?id1=$pid'><input type='button' class='btn btn-success br-5' value='BUY' ></a>


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