<?php
/*
	file:	admin/updateFormDep.php
	desc: 	Displays selected department to update name
*/
if(!empty($_GET['depID'])) $depID=$_GET['depID'];
else $depID='';
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
	<h2>Personnel application - Administration - Departments - Update department</h2>
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
	if($update) echo "Name of department updated successfully!";
	include('../db.php');
	$sql="select * from department where depID=$depID";
	$result=$conn->query($sql);
	if ($result->num_rows > 0){
		//found the department, display form
		$row=$result->fetch_assoc();
	?>
		<form method="post" action="updateDep.php">
		 <input type="hidden" name="depID" 
			value="<?php echo $row['depID']?>" />
			<table>
			 <tr>
				<td>Department ID</td>
				<td><?php echo $row['depID']?></td>
			 </tr>
			 <tr>
				<td>Department name</td>
				<td><?php echo $row['department']?></td>
			 </tr>
			 <tr>
				<td>New Name</td>
				<td><input name="department" value="<?php echo $row['department']?>" /></td>
			 </tr>
			 <tr>
				<td></td>
				<td><input type="submit" value="Update"/></td>
			 </tr>
			</table>
		</form>
	<?php
	}else echo "<p>Department not found</p>";
	$conn->close();
	?>
	</p>
  </body>
 </html>