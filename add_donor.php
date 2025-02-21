<?php
if(isset($_POST['read'])){
	$id=$_POST['id'];
	$blood=$_POST['blood'];
	$about=$_POST['about'];
	$null='NULL';
	if($about=='pending'){
		$conn=mysqli_connect("localhost","root","","mydb");
		//use trigger after update, insert into bloodbank
		$sql="UPDATE donor_detail SET donor_about='read' WHERE donor_id='$id'";
		$result=mysqli_query($conn,$sql) or die("query failed.");
		if($result==TRUE){
			session_start();
			$_SESSION["add_blood"]="<script>alert('$blood is added to blood bank')</script>";
			
			header("location:Dashboard_donor.php");
		}


		



		
	}

	else{
		header("location:Dashboard_donor.php");
	}
}
?>