<?php
require 'DB_conn.php';


// If the user is not logged through the session it will redirect to the login page
if (!isset($_SESSION['valid_user'])) {
	header('Location: login.html');
	 $_SESSION['valid_user']=$username;
}

?>


<!DOCTYPE html>
<html>
	<head>
		  <link rel="shortcut icon" href="logo.jpg" />
		<meta charset="utf-8">
		<title>MentalHealth | UG</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
		<link href="style3.css" rel="stylesheet" type="text/css">
		<link rel ="stylesheet"	href="css/bootstrap.min.css">
		</head>
	<body class="loggedin">




		<nav class="navtop">
<div>
	<h3>MentalHealth UG</h3>

	  <a href="tweet.php"><i class="fas fa-sign-out-alt"></i>Tweet</a>&nbsp&nbsp&nbsp

	<a href="myaccount.php"><i class="fas fa-sign-out-alt"></i>Account</a>&nbsp&nbsp&nbsp
   <a href="logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a>&nbsp&nbsp&nbsp

</div>



		</nav>

		<div class="content">
			<h2>Mental Health Tweets</h2><div class="">

<div class="">

			<p>Welcome back, <?php echo $_SESSION['valid_user'];
?>
			<div class="panel-body">
				 <form method="post" action="home.php">
					<label for="exampleInputEmail1">Status</label>
 	 				How are you feeling today?
 	 				<input type="text" name="status" class="form-control" id="exampleInputEmail1" placeholder="What's your status today">
 <br>
					 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
			</p>
	</div>
			<?php


		 if (isset($_POST['status'])) {
			 if (!empty($_POST['status'])) {
				 $status = mysqli_real_escape_string($conn,$_POST['status']);
				 $username=$_SESSION['valid_user'];
				 $query = "UPDATE users SET Status='".$status."' WHERE username='$username'";
				 $query_run = mysqli_query($conn,$query);
				 if ($query_run) {
					 $smsg="Succesfully updated your status";
						 }
		 else {
		$fmsg="Network issue try again later";
		 }
 }
}
		?><?php  if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($fmsg2)){
?>
<div class="alert alert-danger" role="alert"> <?php echo $fmsg2; ?> </div>
<?php }?>

			<div class="panel panel-default">
<div class="panel-heading">MentalHealthConfessions</div>
  <div class="panel-body">
  <?php
  	$query_comment_sql = "SELECT * FROM comments ORDER BY ID DESC";
  	$query_run_comment_sql = mysqli_query($conn, $query_comment_sql);
  	while($query_fetch_comment_sql = mysqli_fetch_assoc($query_run_comment_sql)){
  		$hash = md5(strtolower(  $query_fetch_comment_sql['name']  ));
		$size = 100;
  		$grav_url = "https://www.gravatar.com/avatar/" . $hash . "?s=" . $size;
  ?>
  	<div class="row">
  		<div class="col-md-1">
  			<img src="profile.png">
  		</div>
  		<div class="col-md-9">
  			<p><strong><?php echo "@".$query_fetch_comment_sql['name']; ?></strong> </p>
  			<p><strong><?php echo $query_fetch_comment_sql['subject']; ?></strong></p>
				<small><p><?php echo $query_fetch_comment_sql['submittime']; ?>&nbsp&nbsp&nbsp&nbsp <input type="button" onclick="showReplyForm(this);"></input>
         <form class="" action="index.html" method="post" style="display: none;">
					 <input type="reply" name="reply" value="" >

         </form>

				  </small>
			  		</div>
  	</div>
  	<br>
  	<?php } ?>
  </div>
</div>

		</div>
<script type="text/javascript">

2
3
4
5
6
7
8
9
10
11
12
<script>

function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}

</script>
</script>
	</body>
</html>
