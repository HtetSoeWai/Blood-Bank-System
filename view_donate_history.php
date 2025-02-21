<?php
session_start();
?>
<?php
 if(isset($_SESSION['uemail'])){
 	$email=$_SESSION['uemail'];

 }
	

	$conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");
	$result=mysqli_query($conn,"call view_donate_history('$email')");
	$count=0;
	$str="";
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result)){
			$count++;
			$str.=$row['donor_blood']."is donated at " .$row['donor_date']."        ";
			

		}
	}
if($count==0){
	$str1="Your Donation time is".$count."time ";
	$str="Save a life by donating blood";

}
if($count==1){
	$str1="Your Donation time is ".$count." time ";
}
else{
	$str1="Your Donation time is ".$count." times ";
}
$_SESSION['donate_history']="<script>alert('$str1\\n$str')</script>";

header("location:BecomeDonor.php"); 
?>