<?php
require 'DB_conn.php';



//CHECHKING IF USER HAS FILLED IN FORM DATA
if (isset($_POST['username']) && isset($_POST['password'])) {
if (!empty($_POST['username'])&&!empty($_POST['password'])) {
  $name = strtolower($_POST['username']);
  $password = strtolower($_POST['password']);
  $MD5_HARSH_ALGORITHM = md5($password);

$query_login="SELECT `id`,`username`,`password` FROM `users` WHERE `username`='".mysqli_real_escape_string($conn,$name)."' AND `password`='".mysqli_real_escape_string($conn,$MD5_HARSH_ALGORITHM)."'";
$query_run_login=mysqli_query($conn,$query_login);
if (mysqli_num_rows($query_run_login)==1) {
  $fetch_data = mysqli_fetch_assoc($query_run_login);
  $username = $fetch_data['username'];
  $userpassword = $fetch_data['password'];
  $_SESSION['valid_password']=$userpassword;
$_SESSION['valid_user']=$username;
  header('Location: home.php');
}else {
  header('Location: login.html');
 }
}

  else {
     header('Location: login.html');
   }
 }

else {
    header('Location: login.html');
}

 ?>
