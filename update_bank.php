
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
      table,th,td{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;

        
      }
      
      td{
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 5px;
        padding-bottom: 5px;
        
      }

       table{
        margin-left: 35%;
        margin-top: 200px;

       }
       #tt{
        height: 50px;
        background-color: #0A2558;
        color: white;
        font-size: 15px;
       }
     </style>
</head>
<body>
	<?php
	if(isset($_POST['update'])){
		$id=$_POST['id'];
		$blood=$_POST['blood'];
		$about=$_POST['about'];
		
		if($about=='pending'){
			$conn=mysqli_connect("localhost","root","","mydb");
			//call storedprocedure blood_search 
			$result=mysqli_query($conn,"call blood_search('$blood')");

			if(mysqli_num_rows($result)>0)
			{
				?>
				<table>
					<tr id="tt">
						<th>blood_id</th>
						<th>donor_id</th>
						<th>donor_blood</th>
						<th>action</th>
					</tr>
					<?php
					while($row=mysqli_fetch_assoc($result)){
						?>
						<tr>
							<td><?php echo $row['blood_id']; ?></td>
							<td><?php echo $row['donor_id']; ?></td>
							<td><?php echo $row['blood_type']; ?></td>
							<td>
								<form action="receiver_update.php" method="post">
									<input type="hidden" name="blood_id" value=<?php echo $row["blood_id"]; ?>>
									<input type="hidden" name="receiver_id" value=<?php echo $id; ?>>
									<input type="hidden" name="receiver_about" value=<?php echo $about; ?>>
									<input type="submit" name="receive" value="take">
								</form>
							</td>
						</tr>
						<?php

						
					}
					?>
				</table>
				<?php
			}
			else{
			session_start();
			$_SESSION["noblood"]="<script>alert('$blood is not available now')</script>";
			header("location:Dashboard_receiver.php");
		}
			
			

		}
		else{
			header("location:Dashboard_receiver.php");
		}

	}
	?>

</body>
</html>