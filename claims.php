<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Claims Car Insurance</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/claims.css">

</head>
<body style="max-width: 100%; overflow-x: hidden;background-color: rgb(245,246,250);">
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






	<form class="needs-validation" id="claimForm" method="POST" action="PHPclaims.php"
	enctype="multipart/form-data"

	>
		<div class="form-row">
			<div class="col-md-5 mb-3">
				<label for="validationTooltip01">*Policy No.</label>
				<input type="text" class="form-control" name="policy_id" id="validationTooltip01" placeholder="policy no." required>
			</div>
		</div>
		
		<div class="form-row">
			<div class="col-md-5 mb-3">

				<div class="form-group">
					<label for="Textarea1">*Tell us What happened ?</label>
					<textarea class="form-control" name="claim_desc" id="Textarea1" rows="3" placeholder="Minimum discription of 100 words required" required></textarea>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-5 mb-3">
				<label for="validationTooltipUsername">*Claim Amount</label>
				<div class="input-group">
					<input type="text" class="form-control" name="claimamount" id="phoneno" required>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="col-md-5 mb-3">
				<label for="validationTooltipUsername">*Attach image</label>
				<div class="input-group">
					<input type="file" name="image" id="photo">
				</div>
			</div>
		</div>
	
		<button class="btn btn-primary br-5" type="submit" name = "reg" >Register Claim</button>
	</form>


	<div id="claimimg1">
		<img src="images/car/claims1.png" width="100%">
	</div>

	<div>
		<img src="images/car/claim3.png" width="100%">
	</div>


</body>
</html>