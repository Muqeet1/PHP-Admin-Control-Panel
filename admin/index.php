<?php
/*
	file:	admin/index.php
	desc: 	displays the user interface for administration
*/
session_start();
if(!isset($_SESSION['user'])) header("location:../index.php");
else{
	$user=$_SESSION['user'];
	header('Cache-control:no-store,no-cache,must-revalidate');
}
?>
<!DOCTYPE html>
 <head>
	<title>Personnel - Administration</title>
 </head>
 <body>
	<h2>Personnel application - Administration</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		Admin home
		<a href="users.php">Users</a>
		<a href="persons.php">Persons</a>
		<a href="departments.php">Departments</a>
		<a href="logout.php">Logout</a>
	</p>
	<p>
		This is the Personnel Application administration view
	</p>
 </body>
</html>