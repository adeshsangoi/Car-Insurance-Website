<?php 
session_set_cookie_params(0);
session_start();
include 'connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>PROGRESS Car Insurance</title>
	
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
				case 1:
				var x = document.getElementById("carnuminput").value;

				var flag=x.match(/\w{2}\d{2}\w{2}\d{4}/);
				console.log(x);

				if(flag!= null && x!=""){
					document.getElementById("Finalcarno").value=x;		
				}else{
					alert("Car Number format Should be something like MH02AD1234")
					header('location:progress.php'); 

				}


				break;

				case 2:
				var x = document.getElementById("carbrandinput").value;
				console.log(x);
				document.getElementById("Finalcarbrand").value=x;

				break;

				case 3:
				var x = document.getElementById("carfuelinput").value;
				console.log(x);
				document.getElementById("Finalfueltype").value=x;
				break;

				case 4:
				var x = document.getElementById("carmodelinput").value;
				console.log(x);
				document.getElementById("Finalcarmodel").value=x;
				break;

				case 5:
				var x = document.getElementById("carregister_yearinput").value;
				console.log(x);
				document.getElementById("Finalreg_year").value=x;
				break;

			}
		}

		function setbrand(val){
			console.log(val);
			document.getElementById("carbrandinput").value=val;
			load_in_Final(2);

		}

		function setfuel(val){
			console.log(val);
			document.getElementById('carfuelinput').value=val;
			load_in_Final(3);

		}

		function setmodel(val){
			console.log(val);
			document.getElementById('carmodelinput').value=val;
			load_in_Final(4);
		}

		function setreg_year(val){
			console.log(val);
			if (val=="Bought New Car") {
				document.getElementById("anchor").href="#policyType";
				return false;
				document.getElementById("carregister_yearinput").value=2018;
			}
			else{
				document.getElementById("anchor").href="#policyStatus";
				document.getElementById("carregister_yearinput").value=val;
			}
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
					<form>

						<div id="FinalCarNoDiv" class="row">
							<div class="col-4">
								<label for="Finalcarno">Car Number:</label>
							</div  class="col-6">
							<div class="col-6">
								<?php

								if (isset($_SESSION['carNo'])) {
									$CN=$_SESSION['carNo'];
									echo "
									<input type='text' name='Finalcarno' id='Finalcarno' value='".$CN."'readonly>
									";
								}
								else{
									echo "
									<input type='text' name='Finalcarno' id='Finalcarno' readonly>
									";
								}
								?>
							</div>
							<div class="col-2">
								<a href="progress.php">
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
						<div id="carNo.">
							<br>
							<br>
							<br>
						</div>
						<div class="pr-5 pl-4 h100" >
							<h1>Car No.</h1>
							Enter your car number in the given format. If your car has only a 3 digit number eg.672, then write it as 0672.
							<br>
							<br>
							<form id="carnumform" action="carBrand.php" method="POST">
								<div class="form-group" >
									<label for="carnuminput">Enter Your Car No.</label>
									
									<?php

									if (isset($_SESSION['carNo'])) {
										$CN=$_SESSION['carNo'];
										echo "
										<input type='text' class='form-control' name='carnumber' id='carnuminput' placeholder='Eg: MH02AG5678'
										value='".$CN."' 
										pattern='[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}'>
										";
									}
									else{
										echo "
										<input type='text' class='form-control' name='carnumber' id='carnuminput' placeholder='Eg: MH02AG5678' 
										pattern='[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}'>
										";
									}
									?>

									<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
								</div>
								<a href="#">
									<button type="submit" class="btn btn-success br-5" onclick="load_in_Final(1)">Next</button>
								</a>
							</form>
						</div>
					</div>

				</div>					
			</div>
		</div>
	</div>
	



</body>
</html>