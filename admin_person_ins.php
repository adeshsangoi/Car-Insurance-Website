<?php 
session_start();
include 'connect.php';

$qry="SELECT * from person_insurance";
$result=$conn->query($qry);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Index Car Insurance</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/adminpage.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
		<a class="navbar-brand" href="index.php">HOME</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="progress.php">Check Eligibility<span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="aboutus.php">About US</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="contactus.php">Contact US</a>
				</li>

				<?php  
				
				if(isset($_SESSION['admin'])){
					echo "
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='adminpage.php' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Admin
						</a>
						<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
							<a class='dropdown-item' href='admincardetails.php'>Car details</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='admin_person_ins.php''>person Detais</a>
						</div>
					</li>
					";
				}
				
				?>

				<?php 
				if (isset($_SESSION['lisenceNo'])) {
					echo "

					<li class='nav-item'>
						<a class='nav-link' href='claims.php'>Claims</a>
					</li>

					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Dropdown Profile
						</a>
						<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
							<a class='dropdown-item' href='customer.php'>Profile</a>
							<div class='dropdown-divider'></div>
							<a class='dropdown-item' href='logout.php''>LOG OUT</a>
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
	<br><br><br><br><br>

	<table class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>NO.</th>
				<th scope='col'>Driver_Id</th>
				<th scope='col'>First Name</th>
				<th scope='col'>Last Name</th>
				<th scope='col'>Insurance ID</th>
				<th scope='col'>Car No.</th>
				<th scope='col'>Plan</th>

			</tr>
		</thead>

		<?php  

		if ($result) {
			$row=0;
			while ($data = mysqli_fetch_assoc($result)) {
				$row=$row+1;
				echo "

				<tbody>
					<tr>
						<th scope='row'>".$row."</th>
						<td>".$data['driver_id']."</td>
						<td>".$data['fname']."</td>
						<td>".$data['lname']."</td>
						<td>".$data['insurance_id']."</td>
						<td>".$data['car_no']."</td>
						<td>".$data['plan_id']."</td>

					</tr>
				</tbody>

				";

			}
		}

		?>
	</table>

	
</body>
</html>