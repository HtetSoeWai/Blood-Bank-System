<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <title>Slide Navbar</title>
   <link rel="stylesheet" type="text/css" href="signin.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<style type="text/css">

</style>
</head>
<body style="background: #fffbd5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #b20a2c, #fffbd5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #b20a2c, #fffbd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
<?php 
   if(isset($_SESSION["login_back"])){
      echo  $_SESSION["login_back"];
      session_destroy();
   }

?>
   <div class="main" style=" background: #ED213A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #93291E, #ED213A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #93291E, #ED213A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">   
      <input type="checkbox" id="chk" aria-hidden="true">

         <div class="signup"  >
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               <label for="chk" aria-hidden="true">Login</label>
               <input type="email" name="uemail" placeholder="Email" required="">
               <input type="password" name="upassword" placeholder="Password" required="">
               <input type="submit" name="ulogin" value="Login" style="width: 60%;
   height: 40px;
   margin: 10px auto;
   justify-content: center;
   display: block;
   color: #fff;
   background: #b32400; 
   font-size: 1em;
   font-weight: bold;
   margin-top: 20px;
   outline: none;
   border: none;
   border-radius: 5px;
   transition: .2s ease-in;
   cursor: pointer;">

            </form>

   <?php
 
 
  $conn=mysqli_connect("localhost","root","","mydb");

  if(isset($_POST["ulogin"])){

    $uemail=mysqli_real_escape_string($conn,$_POST["uemail"]);
    $upassword=mysqli_real_escape_string($conn,$_POST["upassword"]);

    $sql="SELECT * from user_login where uemail='$uemail' and upassword1='$upassword'";
    $result=mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){
        
         $_SESSION['valid'] = true;
         $_SESSION['timeour']=time();
        $_SESSION["uemail"]=$uemail;
        $_SESSION["upassword"]=$upassword;
        $_SESSION["fullname"]=$row['fullname'];
        $_SESSION["uphone"]=$row['uphone'];
        $_SESSION["ugender"]=$row['ugender'];
        header('location:index1.php');
        
      }
    }
    else {
      echo"<script>alert('Your email or password is incorrect,login back')</script>";
      
    }

  }
   ?>





            <br><br>
            <center><a href="register.php" style="color: white;">Create New Account</a></center>
         </div>

         <div class="login" >
            
            <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
               <label for="chk" aria-hidden="true" style="color: #ED213A; ">Admin Login</label>
               <input type="email" name="aemail" placeholder="Email" required="">
               <input type="password" name="apassword" placeholder="Password" required="">
               <input type="submit" name="alogin" value="login" style="width: 60%;
   height: 40px;
   margin: 10px auto;
   justify-content: center;
   display: block;
   color: #fff;
   background: #ED213A; 
   font-size: 1em;
   font-weight: bold;
   margin-top: 20px;
   outline: none;
   border: none;
   border-radius: 5px;
   transition: .2s ease-in;
   cursor: pointer;">
            </form>
              
<?php
 
 
  $conn=mysqli_connect("localhost","root","","mydb");

  if(isset($_POST["alogin"])){

    $aemail=mysqli_real_escape_string($conn,$_POST["aemail"]);
    $apassword=mysqli_real_escape_string($conn,$_POST["apassword"]);

    $sql="SELECT * from admin_login where aemail='$aemail' and apassword='$apassword'";
    $result=mysqli_query($conn,$sql) or die("query failed.");

    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result)){
        
         $_SESSION['valid'] = true;
         $_SESSION['timeour']=time();
        $_SESSION["aemail"]=$aemail;
        header('location:Dashboard.php');
        
      }
    }
    else {
      echo"<script>alert('Your email or password is incorrect,login back')</script>";
      
    }

  }
   ?>
         </div>
   </div>



</body>
</html>