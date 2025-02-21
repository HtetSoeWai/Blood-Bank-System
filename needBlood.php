<?php 
session_start();
if(isset($_SESSION["need_blood"])){
    echo  $_SESSION["need_blood"];
    unset($_SESSION['need_blood']);
}
if(isset($_SESSION['receive_history'])){
        echo $_SESSION['receive_history'];
        unset($_SESSION['receive_history']);
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/images/fav.jpg">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
  <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <style type="text/css">
   :root {
    --red: hsl(0, 78%, 62%);
    --cyan: hsl(180, 62%, 55%);
    --orange: hsl(34, 97%, 64%);
    --blue: hsl(212, 86%, 64%);
    --varyDarkBlue: hsl(234, 12%, 34%);
    --grayishBlue: hsl(229, 6%, 66%);
    --veryLightGray: hsl(0, 0%, 98%);
    --weight1: 200;
    --weight2: 400;
    --weight3: 600;
}
select{
  height: 40px;
  width: 20%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
#showButton{
    width: 100px;
}

body {
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    background-color: var(--veryLightGray);
}
.box {
    border-radius: 5px;

    box-shadow: 0px 30px 40px -20px var(--grayishBlue);
    padding: 30px;
    margin: 20px;  
}




table{			
    display: inline-block;
    width: 20%;

    
    margin: 10px;

}
td{
   padding: 5px;
}


</style>
</head>
<body>
	<header class="continer-fluid ">
        <div class="header-top">
            <div class="container">
                <div class="row col-det">
                    <div class="col-lg-6 d-none d-lg-block">
                        <ul class="ulleft">
                            <li>
                                <i class="far fa-envelope"></i>
                                bloodbankpathein@gmail.com
                                <span>|</span></li>
                                <li>
                                    <i class="far fa-clock"></i>
                                Service Time : 24:Hour</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <ul class="ulright">
                             <li>
                                <i class="fas fa-user"></i>
                                <a href="view_receive_history.php" style="color:white;">View History</a></li>
                                <li>
                                    <i class="fas fa-user"></i>
                                    <a href="index.php" style="color:white;">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="menu-jk" class="header-bottom">
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-md-3 logo">
                            <img src="assets/images/needbloodlogo.jpg" alt="" >
                        </div>
                        <div class="col-md-9 nav-col">
                            <nav class="navbar navbar-expand-lg navbar-light">

                                <button
                                class="navbar-toggler"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarNav"
                                aria-controls="navbarNav"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index1.php">Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index1.php">About Us</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="index1.php">Why Donate</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="BecomeDonor.php">Donor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="needBlood.php">Need Blood</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index1.php">Contact US</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header><br><br>
    <center><h2>Choose Blood You Need</h2><br><form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <select name="bloodtype">
        <option>Select</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>

    </select><br>
    <br>


    <input type="submit" name="submit" value="submit" id="showButton">

</form></center>	

<center>
   <div >
      <?php 


      if(isset($_POST["submit"])){
        $conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");

        $bloodtype=mysqli_real_escape_string($conn,$_POST['bloodtype']);
        $result=mysqli_query($conn,"call view_need_blood('$bloodtype')");


        if(mysqli_num_rows($result)>0)
        {
          while($row=mysqli_fetch_assoc($result)){ ?>

             <table style=" border-top: 3px solid var(--red);" class="box red">

                 <tr><td>Name</td><td><?php echo $row["donor_name"]; ?></td></tr>

                 <tr><td>Age</td><td><?php echo $row["donor_age"]; ?></td></tr>

                 <tr><td>Gender</td><td><?php echo $row["donor_gender"]; ?></td></tr>
                 <tr><td>Blood type</td>	<td><?php echo $row["donor_blood"]; ?></td></tr>
                 <tr><td>Address</td><td><?php echo $row["donor_address"]; ?></td></tr>
                 <tr ><td colspan=2><center><form action="needblood_register.php" method="post"><input type="submit" name="" value="Get"  style=" width: 100px"></form></center></td></tr>

             </table>

         <?php }

     }
     else{
        echo"<script>alert('$bloodtype is not available in blood bank')</script>";
    }
}

?>

</div>


</center>

</body>
</html>