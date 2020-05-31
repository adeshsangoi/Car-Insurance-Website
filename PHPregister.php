<?php 
	
	session_start();
	
	
	
	include 'connect.php';

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$lisence=$_POST['lisence'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$pass=$_POST['pass'];
	$city=$_POST['city'];
	$pin=$_POST['pin'];

	// echo $fname.$lname.$lisence.$email.$phone.$pass.$city.$pin;

	//Query for Dublication check
	$qry="SELECT * from person where email='$email' ";
	$result=mysqli_query($conn,$qry);
	$num=mysqli_num_rows($result);

	if($num > 0){
		// alert('email already exists');
		header('location:register.php');
	}
	else{	
		//QUERY for insert in DB
		$qry="INSERT into person(fname,lname,driver_id,email,phone,password,city,pincode) values ('$fname','$lname', '$lisence', '$email','$phone','$pass','$city','$pin')";
		
		mysqli_query($conn,$qry);
		// Start Session
		$_SESSION['lisenceNo']=$lisence;
		$_SESSION['username'] = $fname." ".$lname; 
		// header('location:'.$_SESSION['from_url']); 

		header('location:index.php'); 

	}
?>