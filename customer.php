<?php 

session_start();
include 'connect.php';

$Lno = $_SESSION['lisenceNo'];

$qry="SELECT * FROM person WHERE driver_id= '$Lno' ";
$person=mysqli_query($conn,$qry);
while ($row1= mysqli_fetch_assoc($person)) {
	$name=$row1['fname'];
	$did=$row1['driver_id'];
	$email=$row1['email'];
	$phone=$row1['phone'];
	$pass=$row1['password'];
	$city=$row1['city'];
	$pin=$row1['pincode'];	
		// echo $name;
		// echo $did;
		// echo $email;
		// echo $phone;
		// echo $pass;
		// echo $city;
		// echo $pin;
	break;	
}

	// fname	lname	driver_id	email	phone	password	city	pincode

$qry1="SELECT i.insurance_id,p.plan_name,i.no_of_claims,i.amount_claimed,p.premium,p.total_cover,p.tenure,i.registration_date
from insurance as i inner join plans as p on i.plan_id=p.plan_id
where i.driver_id='$Lno'";
$result2=mysqli_query($conn,$qry1);
// print_r($result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/customer.css">
</head>
<body style="overflow-x: hidden;">
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


	<div class="row" style="padding-top: 52px">
		<div class="col-4 py-3 ml-0 mt-2">
			<!-- <img src="images/my_account.png" width="100%"> -->
			<!-- Button trigger modal -->
			<div class="profileDiv br-5">
				<form class="needs-validation py-3" novalidate>
					<div class="form-row">
						<div class="col-md-10 mb-3">
							<label for="validationTooltip01">First name</label>
							<?php 
							
							echo"
							<input type='text' class='form-control' id='validationTooltip01' 
							value='".$name."' readonly>
							";
							?>
						</div>	
					</div>

					<div class="form-row">
						<div class="col-md-8 mb-3">
							<label for="lisence">Driver Lisence No.</label>
							<div class="input-group">
								<?php 

								echo"
								<input type='text' class='form-control' id='lisence' placeholder='Lisence no.' aria-describedby='lisence' required value='".$did."' 		
								style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;' readonly>
								";
								?>

							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-8 mb-3">
							<label for="email">Email</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text leftbr-5" id="email">@</span>
								</div>
								<?php
								
								echo"
								<input type='email' class='form-control' id='email' value='".$email."' aria-describedby='email' readonly 		
								style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
								";
								?>
								<div class="invalid-tooltip">
									Please choose a unique and valid username.
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-8 mb-3">
							<label for="phone">Phone No.</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text leftbr-5" id="phone">+91</span>
								</div>

								<?php  
								
								echo
								"<input type='text' class='form-control' id='phone' value='".$phone."'aria-describedby='phone' readonly 		
								style='border-bottom-right-radius: 5px;border-top-right-radius: 5px;'>
								";
								?>
							</div>
						</div>
					</div>

					<div class="form-row">

						<div class="col-md-6 mb-3">
							<label for="validationTooltip05">Pin</label>
							<?php
							
							echo"
							<input type='text' class='form-control' id='validationTooltip05' value='".$pin."' maxlength='6' minlength='6' readonly>
							";  
							?>
						</div>
					</div>
					<!-- <button class="btn btn-primary rightbr-5 leftbr-5" type="submit">Submit form</button> -->
				</form>
				<button type="button" class="btn btn-danger br-5 ml-4" data-toggle="modal" data-target="#exampleModalCenter">
					Edit Profile
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Update Profile</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<form class="needs-validation py-3" novalidate>
									<div class="form-row">
										<div class="col-md-6 mb-3">
											<label for="validationTooltip01">First name</label>
											<input type="text" class="form-control" id="validationTooltip01" placeholder="First name" required>
											<div class="valid-tooltip">
												Looks good!
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<label for="validationTooltip02">Last name</label>
											<input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" required>
											<div class="valid-tooltip">
												Looks good!
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-8 mb-3">
											<label for="lisence">Driver Lisence No.</label>
											<div class="form-group">
												<input type="text" class="form-control" id="lisence" placeholder="Lisence no." aria-describedby="lisence" required value="LOREM" 		
												style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;" readonly>

												<small id="lisence" class="form-text text-muted">Lisence Number can't be changed.</small>

											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-8 mb-3">
											<label for="email">Email</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text leftbr-5" id="email">@</span>
												</div>
												<input type="email" class="form-control" id="email" placeholder="Email" aria-describedby="email" required 		
												style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">
												<div class="invalid-tooltip">
													Please choose a unique and valid username.
												</div>
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-8 mb-3">
											<label for="phone">Phone No.</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text leftbr-5" id="phone">+91</span>
												</div>
												<input type="text" class="form-control" id="phone" placeholder="Phone No." aria-describedby="phone" required 		
												style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">
											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="col-md-8 mb-3">
											<label for="pass">Password</label>
											<div class="input-group">
												<input type="password" class="form-control br-5" id="pass" placeholder="Password" aria-describedby="pass" required
												style="border-bottom-right-radius: 5px;border-top-right-radius: 5px;">

											</div>
										</div>
									</div>


									<div class="form-row">
										<div class="col-md-8 mb-3">
											<label for="validationTooltip03">City</label>
											<input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>

										</div>
									</div>
									<div class="form-row">

										<div class="col-md-4 mb-3">
											<label for="validationTooltip05">Pin</label>
											<input type="text" class="form-control" id="validationTooltip05" placeholder="Pin" maxlength="6" minlength="6" required>

										</div>
									</div>
									<!-- <button class="btn btn-primary rightbr-5 leftbr-5" type="submit">Submit form</button> -->
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary br-5" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary br-5">Save changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="col-8 py-3 policyDiv">
			
			<div class="policieslist">
				
			<?php  
				


				while ($result = mysqli_fetch_assoc($result2)) {
				echo"

				<div class='card bg-light'>
					<div class='card-header'>
						<h4>Policy Name : 
								".$result['plan_name']."
								<br>
						</h4>
						<h4>Insurance ID : 
								".$result['insurance_id']."
								<br>
						</h4>
					</div>
					<div class='card-body'>
						
						<div class='row'>
							
							<div class='card-text '>
								
								<table class='table table-dark pl40'>
									<thead>
										<tr>
											<th scope='col'>Policy Name</th>
											<th scope='col'>
												".$result['plan_name']."
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Total Cover</td>
											<td>".$result['total_cover']."</td>
										</tr>
										<tr>
											<td>Number of Claims</td>
											<td>".$result['no_of_claims']."</td>
										</tr>
										<tr>
											<td>Tenure</td>
											<td>".$result['tenure']."</td>
										</tr>
									</tbody>
								</table>
								
							</div>
							<a href='claims.php' class='btn btn-primary br-5 col-2 claimsbtn'>Claim</a>
						</div>
					</div>
					<div class='card-footer text-muted'>
						<h5>Registeration date:</h5>
						".$result['registration_date']."									
						<br>
					</div>
				</div>

				<br>
				<br>
				";
				}
				?>
				<br>
				<br>

			</div>
		</div>

	</div>
</body>
</html>
