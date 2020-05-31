<?php 
session_start();
include 'connect.php';


$qry0="create or replace view details as SELECT fname,lname,driver_id,email,phone,city from person";
$result0=$conn->query($qry0);

$qry="SELECT * from details";
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

	//person details
	<br>
	<br>
	<br>
	<br>
	<br>

	<table class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>NO.</th>
				<th scope='col'>First Name</th>
				<th scope='col'>Last Name</th>
				<th scope='col'>driver_ID</th>
				<th scope='col'>Email</th>
				<th scope='col'>phone</th>
				<th scope='col'>city</th>
			</tr>
		</thead>
		<?php  
		if ($result) {
			$row=0;
			while ($person = mysqli_fetch_assoc($result)) {
				$row=$row+1;
				echo "
				<tbody>
					<tr>
						<th scope='row'>".$row."</th>
						<td>".$person['fname']."</td>
						<td>".$person['lname']."</td>
						<td>".$person['driver_id']."</td>
						<td>".$person['email']."</td>
						<td>".$person['phone']."</td>
						<td>".$person['city']."</td>

					</tr>
				</tbody>
				";

			}
		}

		?>
	</table>



</body>
</html>