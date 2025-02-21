<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		div{
			float: left;
			width: 25%;
			height: 25%;
			padding: 10px;
			margin: 10px;
			border: 2px solid black;

		}
	</style>
</head>
<body>
<div>
	<?php 
		$tot_blood=0;
		$conn=mysqli_connect("localhost","root","","mydb");
		$sql="SELECT * from blood_bank where receiver_id='0'";
    	$result=mysqli_query($conn,$sql) or die("query failed.");

    	if(mysqli_num_rows($result)>0)
    	{
      		while($row=mysqli_fetch_assoc($result)){
      			$tot_blood++;
      		}
      	}

	?>
	<h1><?php echo"$tot_blood";?></h1>
	<h3>Total Blood Available</h3>
	<a href="view_bloodbank.php">Full Deatil</a>
</div>
<div>
	<?php 
		$tot_donor=0;
		$conn=mysqli_connect("localhost","root","","mydb");
		$sql="SELECT * from donor_detail where donor_about='pending'";
    	$result=mysqli_query($conn,$sql) or die("query failed.");

    	if(mysqli_num_rows($result)>0)
    	{
      		while($row=mysqli_fetch_assoc($result)){
      			$tot_donor++;
      		}
      	}

	?>
	<h1><?php echo"$tot_donor";?></h1>
	<h3>Total Pending DonorList</h3>
	<a href="view_bloodbank.php">Full Deatil</a>
</div>
<div>
	<?php 
		$tot_receiver=0;
		$conn=mysqli_connect("localhost","root","","mydb");
		$sql="SELECT * from receiver_detail where receiver_about='pending'";
    	$result=mysqli_query($conn,$sql) or die("query failed.");

    	if(mysqli_num_rows($result)>0)
    	{
      		while($row=mysqli_fetch_assoc($result)){
      			$tot_receiver++;
      		}
      	}

	?>
	<h1><?php echo"$tot_receiver";?></h1>
	<h3>Total Pending ReceiverList</h3>
	<a href="receiverlist.php">Full Deatil</a>
</div>
</body>
</html>