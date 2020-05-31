<?php 

	session_start();
	
    include 'connect.php';
	
 	if (isset($_POST['reg']) && isset($_FILES['image'])) {
 	$errors = array(); 

	$policyid=$_POST['policy_id'];
	$claim_desc=$_POST['claim_desc'];
	$claimamount=$_POST['claimamount'];
	
	// if (empty($policyid)) { array_push($errors, "Policyid is required"); }
 //  	if (empty($claim_desc)) { array_push($errors, "Description is required"); }
 //  	if (empty($claimamount)) { array_push($errors, "Amount is required"); }
  	
 //  	if (count($errors) == 0) {

	$check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES["image"]["tmp_name"];
        $imgContent = addslashes(file_get_contents($image));

	$namecheck =$_SESSION['lisenceNo'];
	// echo $namecheck;
	// echo $claim_desc;
	// echo $claimamount;
	// echo $policyid;

	$query = "INSERT INTO claims(insurance_id,description,amount,lisense,image1) VALUES ('$policyid', '$claim_desc','$claimamount','$namecheck','$imgContent')";
    //mysqli_query($db,$query);
      mysqli_query($conn,$query);
        


}

}
?>

<script type="text/javascript">
	alert("Your claim has been successfully submitted. You can check my claims for further updates");
 location='index.php';
</script>