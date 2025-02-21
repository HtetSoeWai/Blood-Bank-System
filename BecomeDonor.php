<?php session_start(); 
if(isset($_SESSION['donate_history'])){
    echo $_SESSION['donate_history'];
    unset($_SESSION['donate_history']);
}
?>
<!DOCTYPE html>
<html>
<head>
	
	
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Web App Landing Page Website Tempalte | Smarteyeapps.com</title>
 <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
 <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
 <link rel="shortcut icon" href="assets/images/fav.jpg">
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
 <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
 <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
 <style type="text/css">
   td{padding: 20px;
   }
   select{
       width: 200px;
   }
   #button{
       width: 150px;
       background-color:red;
       border-radius: 10px;
       color:white;
   }
   input,select{
    width: 200px;
    height: 40px;
    border-radius: 8px;
}
textarea{
    border-radius: 8px;
}
</style>
</head>
<body>
    <?php 
    if(isset($_SESSION["uemail"])&&isset($_SESSION["uphone"])&&isset($_SESSION["ugender"])&&isset($_SESSION["fullname"])){
        $donor_name=$_SESSION["fullname"];
        $donor_phone=$_SESSION['uphone'];
        $donor_gender=$_SESSION['ugender'];
        $donor_email=$_SESSION['uemail'];
        ?>
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
                                    <a href="view_donate_history.php" style="color:white;">View History</a></li>
                                    <li>
                                        <i class="fas fa-user"></i>
                                        <a href="index.php" style="color:white;">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu-jk" class="header-bottom">
                        <div class="container">
                            <div class="row nav-row">
                                <div class="col-md-3 logo">
                                    <img src="assets/images/becomedonorlogo.jpg" alt="">
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
            </header>
            <div align="center" style="margin: 40px;"><h1><b>Donate Blood</b></h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                 <table style="padding: 20px;">

                  <tr><td>Full Name <br><input type="text" name="donor_name" value="<?php echo $donor_name;?>" required></td>
                   <td>Phone Number <br><input type="text" name="donor_phone" value="<?php echo $donor_phone;?>" required></td>
                   <td>Donation date <br><input type="date" name="donor_date" required></td>
               </tr>

               <tr><td>Age <br><input type="text" name="donor_age" required></td>
                <td>Blood Group <br>
                    <select name="donor_blood" required>

                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </td>
                <td>Gender<br>
                    <?php if($donor_gender=='Male'){?>
                        <select name="donor_gender" required>
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    <?php } ?>
                    <?php if($donor_gender=='Female'){?>
                        <select name="donor_gender" required>
                            <option value="Male" >Male</option>
                            <option value="Female" selected>Female</option>
                            <option value="Other">Other</option>
                        </select>
                    <?php } ?>
                    <?php if($donor_gender=='Other'){?>
                        <select name="donor_gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other" selected>Other</option>
                        </select>
                    <?php } ?>
                </td>

            </tr>

            <tr>

                <td colspan="2">Address<br><textarea rows="3" cols="60" name="donor_address" required></textarea></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="submit" id="button" ></td>
                <td><input type="reset" value="Clear" id="button"></td>

            </tr>
        </table>
    </form></div>
    <?php



    if(isset($_POST["submit"])){
        $conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");
        $donor_name=mysqli_real_escape_string($conn,$_POST['donor_name']);
        $donor_phone=mysqli_real_escape_string($conn,$_POST['donor_phone']);
        $donor_age=mysqli_real_escape_string($conn,$_POST['donor_age']);
        $donor_blood=mysqli_real_escape_string($conn,$_POST['donor_blood']);
        $donor_gender=mysqli_real_escape_string($conn,$_POST['donor_gender']);
        $donor_date=mysqli_real_escape_string($conn,$_POST['donor_date']);
        $donor_address=mysqli_real_escape_string($conn,$_POST['donor_address']);
        $donor_email=mysqli_real_escape_string($conn,$donor_email);
        $donor_about=mysqli_real_escape_string($conn,'pending');
        $count=0;
        
            $sql= "INSERT INTO donor_detail(donor_name,donor_phone,donor_email,donor_age,donor_gender,donor_blood,donor_address,donor_date,donor_about) values('$donor_name','$donor_phone','$donor_email','$donor_age','$donor_gender','$donor_blood','$donor_address','$donor_date','$donor_about')";
            $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
        
            echo"<script>alert('Successful')</script>";
        

    }
}

?>  

</body>
</html>