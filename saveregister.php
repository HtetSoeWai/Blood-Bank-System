      <?php
      session_start();
      if(isset($_POST["register"])){
        $fullname=$_POST['fullname'];
        $username=$_POST['username'];
        $uemail=$_POST['uemail'];
        $uphone=$_POST['uphone'];
        $upassword1=$_POST['upassword1'];
        $upassword2=$_POST['upassword2'];
        $ugender=$_POST['ugender'];
        if($upassword1==$upassword2){
          if(preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $upassword1)) {
          $conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");
          $sql= "INSERT INTO user_login(fullname,username,uemail,uphone,upassword1,upassword2,ugender) values('{$fullname}','{$username}','{$uemail}','{$uphone}','{$upassword1}','{$upassword2}','{$ugender}')";
          $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
          $_SESSION["login_back"]="<script>alert('Hello, $username Please Login Back')</script>";
          header('location:signin.php');
          mysqli_close($conn);
        }
        else{
           $_SESSION["strong"]="<script>alert('Your password is not strong')</script>";
          $_SESSION['valid'] = true;
          $_SESSION['timeour']=time();
          header("location:register.php");
        }
        }
        else{
          $_SESSION["pwdwrong"]="<script>alert('password and confirm password must be same')</script>";
          $_SESSION['valid'] = true;
          $_SESSION['timeour']=time();
          header("location:register.php");

        }
      }
      ?>
