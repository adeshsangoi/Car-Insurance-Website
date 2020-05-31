<?php 
session_set_cookie_params(0);
session_start();
include 'connect.php';

$_SESSION['from_url']=$_SERVER['REQUEST_URI'];

if (isset($_POST["carnumber"]))
{
	$carN=$_POST["carnumber"];
	$_SESSION["carNo"]=$carN;
}


$qry1="SELECT DISTINCT brand FROM car";
$result1=mysqli_query($conn,$qry1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>BRAND Car Insurance</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/progress.css">

</head>
<body style="max-width: 100%; overflow-x: hidden;">

	<script type="text/javascript">
		function load_in_Final(formlevel) {
			switch(formlevel) {

				case 2:
				var x = document.getElementById("carbrandinput").value;
				console.log(x);
				document.getElementById("Finalcarbrand").value=x;

				break;

			}
		}

		function setbrand(val){
			console.log(val);
			document.getElementById("carbrandinput").value=val;
			load_in_Final(2);
 			//BELOW CSS TO BE APPLIED ON BUTTON
		 	// color: #fff;
		  //   background-color: #007bff;
		  //   border-color: #007bff;
		}

	</script>

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
				<div class="progressdiv br-10 py-4" style="height: auto;">
					<form>

						<div id="FinalCarNoDiv" class="row">
							<div class="col-4">
								<label for="Finalcarno">Car Number:</label>
							</div  class="col-6">
							<div class="col-6">
								<?php
								$CN = $_SESSION['carNo'];
								echo"
								<input type='text' name='Finalcarno' id='Finalcarno' value='".$CN."' readonly>
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

								if (isset($_SESSION['carBrand'])) {
									$CB=$_SESSION['carBrand'];
									echo "
									<input type='text' name='Finalcarbrand' id='Finalcarbrand' 
									value='".$CB."' readonly>
									";
								}
								else{
									echo "
									<input type='text' name='Finalcarbrand' id='Finalcarbrand' 
									readonly>
									";	
								}

								?>
							</div>
							<div class="col-2">
								<a href="carBrand.php">
									<img src="images/edit.png" height="25" >
								</a>
							</div>
						</div>
						<br>

					</form>
				</div>
			</div>

			<div class="col-8 bg-grey2 px-0">
				<div class="form_div">

					<div>
						<div id="carBrand">
							<br>
							<br>
							<br>
						</div>
						<div class="pr-5 pl-4 h100" >
							<h1>Car Brand</h1>			
							<form id="carbrandform" method="POST" action="fueltype.php">
								<div class="form-group">

									<div class="form-row align-items-center">
										<div class="col-auto searchforms">
											<label class="sr-only" for="carbrandinput">Car Brand</label>
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text"><img src="images/search.png" height="24"></div>
												</div>

												<?php  

												if (isset($_SESSION['carBrand'])) {
													$CB=$_SESSION['carBrand'];
													echo "
													<input type='text' class='form-control' name='carbrandinput' id='carbrandinput' placeholder='' value='".$CB."'>
													";
												}
												else{
													echo "

													<input type='text' class='form-control' name='carbrandinput' id='carbrandinput' value='Chevrolet'>
													";	
												}

												?>

											</div>
										</div>
									</div>

									<div class="row">

										<?php

										while ($row1= mysqli_fetch_assoc($result1)) {
											$b=$row1['brand'];
											$c=1;
											echo " 
											<div class='col-4'>
												<button type='button' class='btn btn-outline-primary w150 br-5 my-2' onclick='setbrand(\"".$b."\");'>$b</button><br>	
											</div>
											";
										}
										
										?>
									</div>
								</div>
								<a href="#">
									<button type="submit" class="btn btn-success br-5" onclick="load_in_Final(2)">Next</button>
								</a>
							</form>
						<img src="images/cars.png" width = "700px;" height="275px;">
						</div>
					</div>

				</div>					
			</div>
		</div>
	</div>




</body>
</html>