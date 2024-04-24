<?php
require 'DB_conn.php';

// We need to use sessions, so you should always start sessions using the below code or including processing php to get other session data AND MYSQLI FETCH data.

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['valid_user'])) {
	header('Location: login.html');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Account Page</title>
		<link href="style3.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h3>Mental Health UG</h3>
<a href="home.php"> <i class="fas fa-sign-out-alt"></i>Back To Home</a>&nbsp
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>&nbsp
			</div>
		</nav>
		<div class="content">
			<h2>Mental Health Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['valid_user']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?php echo "Currently Unavailable" ?> </td>
					</tr>
					<tr>
						<td>Status:</td>
						<td><?php
             $username = $_SESSION['valid_user'];
						 $query ="SELECT `id`,`username`,`status` FROM users WHERE username='$username'";
						 $query_run=mysqli_query($conn,$query);
             $query_fetch = mysqli_fetch_assoc($query_run);
						 echo $query_fetch['status'];
						 ?> </td>

					</tr>

				</table>
			</div>
		</div>
	</body>
</html>
