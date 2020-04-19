<?php
/*
	file:	admin/updateFormUser.php
	desc: 	Displays selected user to update password
*/
if(!empty($_GET['userID'])) $userID=$_GET['userID'];
else $userID='';
if(!empty($_GET['update'])) $update=$_GET['update'];
else $update=false;
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
	<h2>Personnel application - Administration - Users - Update user</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		<a href="index.php">Admin home</a>
		<a href="users.php">Users</a>
		<a href="persons.php">Persons</a>
		<a href="departments.php">Departments</a>
		<a href="logout.php">Logout</a>
	</p>
	<p>
	<?php
	if($update) echo "Password updated successfully!";
	include('../db.php');
	$sql="select * from user where userID=$userID";
	$result=$conn->query($sql);
	if ($result->num_rows > 0){
		//found the user, display form
		$row=$result->fetch_assoc();
	?>
		<form method="post" action="updateUser.php">
		 <input type="hidden" name="userID" 
			value="<?php echo $row['userID']?>" />
			<table>
			 <tr>
				<td>UserID</td>
				<td><?php echo $row['userID']?></td>
			 </tr>
			 <tr>
				<td>Username</td>
				<td><?php echo $row['username']?></td>
			 </tr>
			 <tr>
				<td>Password</td>
				<td><input name="password" value="<?php echo $row['password']?>" /></td>
			 </tr>
			 <tr>
				<td></td>
				<td><input type="submit" value="Update"/></td>
			 </tr>
			</table>
		</form>
	<?php
	}else echo "<p>User not found</p>";
	$conn->close();
	?>
	</p>
  </body>
 </html>
 
 
 
 
 
 