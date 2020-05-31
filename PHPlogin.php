<?php 
	
	session_start();

	include 'connect.php';

	$email=$_POST['login_email'];
	$pass=$_POST['login_pass'];
	
	if (isset($_POST["login_pass"]) && isset($_POST["login_email"])) {
		
		//query to get check data

		if ($email=='admin@123' && $pass=='123') {
			$_SESSION['admin']=$email;
			$_SESSION['lisenceNo']=0;
		}
		
		$qry="SELECT * from person where email='$email' and password='$pass'";
		$result=mysqli_query($conn,$qry);
		$num=mysqli_num_rows($result);
		$qury = "SELECT fname from person where email='$email' and password='$pass'";
		$fname=mysqli_query($conn,$qury);


		
		if($num>0){
			//login successful and get data of lisence of user
			$result0=mysqli_query($conn,$qry);
			$row=$result0->fetch_assoc();
			$_SESSION['lisenceNo']= $row['driver_id']; 
			$_SESSION['username'] = $row['fname']." ".$row['lname']; 


			//change nav
			if ($_SESSION['from_url']=='register.php') {
				header('location:index.php');
			}
			else header('location:'.$_SESSION['from_url']);
		}
		else{
			//failed to login

			header('location:register.php');

		}
	}


?>