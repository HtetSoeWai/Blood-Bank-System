<?php 
session_start();

$conn=mysqli_connect("localhost","root","","mydb") or die("Connection error");
$receiver_name=$_POST['receiver_name'];
$receiver_phone=$_POST['receiver_phone'];
$receiver_age=$_POST['receiver_age'];
$receiver_blood=$_POST['receiver_blood'];
$receiver_date=$_POST['receiver_date'];
$receiver_address=$_POST['receiver_address'];
$receiver_email=$_POST['email'];
$receiver_about='pending';
$receiver_gender=$_POST['receiver_gender'];

if($receiver_about=='pending'){
    $sql= "INSERT INTO receiver_detail(receiver_name,receiver_phone,receiver_email,receiver_age,receiver_gender,receiver_blood,receiver_address,receiver_date,receiver_about) values('{$receiver_name}','{$receiver_phone}','{$receiver_email}','{$receiver_age}','{$receiver_gender}','{$receiver_blood}','{$receiver_address}','{$receiver_date}','{$receiver_about}')";
    $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
    session_start();
    $_SESSION["need_blood"]="<script>alert('succcessful')</script>";
    
    header("location:needBlood.php");
}

?>