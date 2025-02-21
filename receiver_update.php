
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	if(isset($_POST['receive'])){
		
		$blood_id=$_POST['blood_id'];
		$receiver_id=$_POST['receiver_id'];
		$receiver_about=$_POST['receiver_about'];
		$date=date("Y-m-d H:i:s");
		$conn=mysqli_connect("localhost","root","","mydb");
		if($receiver_about=='pending'){
			//use trigger after update, update receiver_about='read' 
			$sql="UPDATE blood_bank SET receiver_id='$receiver_id',receive_date='$date' WHERE blood_id='$blood_id'";
			$result=mysqli_query($conn,$sql) or die("query failed.");

			if($result==TRUE){
				session_start();
				$_SESSION["receive"]="<script>alert('receiver_id $receiver_id is received  blood at $date')</script>";
				$_SESSION['valid'] = true;
			$_SESSION['timeour']=time();
				header("location:Dashboard_receiver.php");
			}

		}

		
	}

	?>
</body>
</html>