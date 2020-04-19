<?php
/*
	file:	admin/addFormPerson.php
	Desc:	Displays a form for adding a new peron
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
	<h2>Personnel application - Administration - Persons - Add new</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		<a href="index.php">Admin home</a>
		<a href="users.php">Users</a>
		<a href="persons.php">Persons</a>
		<a href="departments.php">Departments</a>
		<a href="logout.php">Logout</a>
	</p>
		<h3>Fill in the form</h3>
	<p>
	<p>
	<?php
	if(isset($_SESSION["message"]) and $_SESSION["message"]!=''){
		echo $_SESSION["message"];
		$_SESSION["message"]='';
	}
	?>
	</p>
	<form action="addPerson.php" method="post">
		<table>
			<tr>
				<td>Firstname</td>
				<td><input name="firstname" value="" placeholder="Firstname" /></td>
			</tr>
			<tr>
				<td>Lastname</td>
				<td><input name="lastname" value="" placeholder="Lastname" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="" placeholder="Email" /></td>
			</tr>
			<tr>
				<td>Salary</td>
				<td><input name="salary" value="" placeholder="Salary" /></td>
			</tr>
			<tr>
				<td>Department</td>
				<td>
					<select name="department">
					<?php
						//get the departments to select here
						echo '<option value="">--Select--</option>';
						include('../db.php');
						$sql="SELECT * FROM department order by department";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['depID'];
							echo '">'.$row['department'].'</option>';
						}
						$conn->close();
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add to database" /></td>
			</tr>
		</table>
	</form>
	</p>
 </body>
</html>