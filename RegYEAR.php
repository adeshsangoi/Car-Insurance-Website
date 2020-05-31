<?php  
session_set_cookie_params(0);
session_start();
include 'connect.php';

if (isset($_POST["carmodelinput"]))
{
	$CM=$_POST["carmodelinput"];
	$_SESSION['carModel']=$CM;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>REG year Car Insurance</title>
	
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

				case 5:
				var x = document.getElementById("carregister_yearinput").value;
				console.log(x);
				document.getElementById("Finalreg_year").value=x;
				break;

			}
		}

		function setreg_year(val){
			console.log(val);
			document.getElementById("carregister_yearinput").value=val;
			load_in_Final(5);
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
								<input type="text" name="Finalreg_year" id="Finalreg_year" readonly required>
							</div>
							<div class="col-2">
								<a href="#carRegisterYear">
									<img src="images/edit.png" height="25" >
								</a>
							</div>
						</div>
						<br>

						<button type="submit" class="btn btn-success br-5" style="margin-left: 275px">View Offers</button>

					</form>
				</div>
			</div>

			<div class="col-8 bg-grey2 px-0">
				<div class="form_div">

					<div>
						<div id="carRegisterYear">
							<br>
							<br>
							<br>
						</div>
						<div class="pr-5 pl-4 h100" >
							<h1>Year of registeration</h1>
							Choose the year in which you bought the car. Make sure you have documents supporting the same. It will be verified when our agent comes over.
							
						<br>
						<br>	
							<form id="car_register_year">
								<div class="form-group">

									<select class="custom-select searchforms" id="carregister_yearinput" style="width: 30%;">
										<!-- <option selected></option> -->
									    <option value="2019">2019</option>

										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016" selected>2016</option>
										<option value="2015">2015</option>
										<option value="2014">2014</option>
										<option value="2013">2013</option>
										<option value="2012">2012</option>
										<option value="2011">2011</option>
										<option value="2010">2010</option>
										<option value="2009">2009</option>
										<option value="2008">2008</option>
										<option value="2007">2007</option>
										<option value="2006">2006</option>
										<option value="2005">2005</option>
										<option value="2004">2004</option>
										<option value="2003">2003</option>
										<option value="2002">2002</option>
										<option value="2002">2001</option>
										<option value="2002">2000</option>
										<option value="2002">1999</option>
										<option value="2002">1998</option>
										<option value="2002">1997</option>
										<option value="2002">1996</option>
										<option value="2002">1995</option>
										<option value="2002">1994</option>
										<option value="2002">1993</option>
										<option value="2002">1992</option>
										<option value="2002">1991</option>
										<option value="2002">1990</option>


									</select>
									<br>
									<br>
									
									<div class="row">
										<div class="col-3">

											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" 
											onclick="setreg_year('2018')">2018</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2014')">2014</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2010')">2010</button><br>						
										</div>
										<div class="col-3">
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2017')">2017</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2013')">2013</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2009')">2009</button><br>

										</div>

										<div class="col-3">
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2016')">2016</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2012')">2012</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2008')">2008</button><br>
										</div>

										<div class="col-3">
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2016')">2015</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2011')">2011</button><br>
											<button type="button" class="btn w150 btn-outline-primary br-5 my-2" onclick="setreg_year('2007')">2007</button><br>
										</div>
									</div>
								</div>
									<!-- <a href="#" id="anchor">
										<button type="button" class="btn btn-success br-5">Next</button>
									</a> -->
								</form>
							</div>
						</div>

					</div>					
				</div>
			</div>
		</div>

		
	</body>
	</html>