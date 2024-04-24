<?php
require "DB_conn.php";

//no security addition for sql injection
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['attendantage'])) {
if (!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['age'])&&!empty($_POST['attendantage'])) {
  $name = strtolower($_POST['username']);
  $password = md5($_POST['password']);
  $age = strtolower($_POST['age']);
  $attendantage = strtolower($_POST['attendantage']);



 $query = "INSERT INTO `users` (`id`, `username`, `password`, `age`, `attendant age`,`status`) VALUES (NULL, '".mysqli_real_escape_string($conn,$name)."', '".mysqli_real_escape_string($conn,$password)."', '".mysqli_real_escape_string($conn,$age)."', '".mysqli_real_escape_string($conn,$attendantage)."','".mysqli_real_escape_string($conn,'')."')";
 $query_run = mysqli_query($conn,$query);
 if ($query_run) {
 header('Location: login.html');
}else {
  echo "failed";
}

}else {

  header('Location: index.php');
  echo "Please fill in all details correctly";
}
}
 ?>
