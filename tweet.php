<?php
require 'DB_conn.php';


// If the user is not logged through the session it will redirect to the login page
if (!isset($_SESSION['valid_user'])) {
	header('Location: login.html');
}

?>


<!DOCTYPE html>
<html>
	<head>
		  <link rel="shortcut icon" href="logo.jpg" />
		<meta charset="utf-8">
		<title>MentalHealth | Tweet</title>
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

	  <a href="home.php"><i class="fas fa-sign-out-alt"></i>Back to home</a>&nbsp&nbsp&nbsp

   <a href="logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a>&nbsp&nbsp&nbsp

</div>



		</nav>

		<div class="content">
			<h2>Mental Health tweet</h2>
			<p><?php echo $_SESSION['valid_user'];?> what's on your mind today?</p>

			<div class="panel panel-default">
			<div class="panel-heading">Want to share what's on your mind? You can choose to stay annonymous when filling in your name this can protect your privacy</div>
			  <div class="panel-body">
			  	<form method="post" action="tweet.php">
			  	  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="You can choose to stay annonymous">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputPassword1">Subject</label>
				    <textarea name="subject" class="form-control" rows="3"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			  </div>
			</div>
			<?php

			if (isset($_POST['name'])&&isset($_POST['subject'])) {
				if ((!empty($_POST['name'])&&!empty($_POST['subject']))) {


			$name = mysqli_real_escape_string($conn,$_POST['name']);
			$subject = mysqli_real_escape_string($conn,$_POST['subject']);
			$date= date('H:i, jS F Y');

			$query_insert = "INSERT INTO `comments` (`id`, `name`, `subject`, `submittime`, `status`)  VALUES('','".mysqli_real_escape_string($conn,$name)."','".mysqli_real_escape_string($conn,$subject)."','".mysqli_real_escape_string($conn,$date)."','')";
			$query_run_insert = mysqli_query($conn,$query_insert);
			if ($query_run_insert) {
			   $smsg = 'Thankyou done.';
			}else {
			   $fmsg = 'There is a problem posting your comment try again later.';
			}
		}else {
			$fmsg2 = "Please fill in both your name and tweet";
		}
	}else{
			  $fmsg2 = "Please fill in both your name and tweet";
			}
			 ?>

			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($fmsg2)){
	?>
<div class="alert alert-danger" role="alert"> <?php echo $fmsg2; ?> </div>
<?php } ?>
		</div>

	</body>
</html>
