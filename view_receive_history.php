<?php
session_start();
?>
<?php
 if(isset($_SESSION['uemail'])){
 	$email=$_SESSION['uemail'];

 }
	

	$conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");
	$result=mysqli_query($conn,"call view_receive_history('$email')");
	$count=0;
	$str="";
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result)){
			$count++;
			$str.=$row['receiver_blood']."is received at " .$row['receiver_date']."        ";
			

		}
	}
if($count==0){
	$str1="Your blood receiving time is".$count."time ";
	$str="";

}
if($count==1){
	$str1="Your blood receiving time is ".$count." time ";
}
else{
	$str1="Your blood receiving time is ".$count." times ";
}
echo $str1.$str;
$_SESSION['receive_history']="<script>alert('$str1\\n$str')</script>";

header("location:needBlood.php"); 
?>