<?php
/*
	file:	admin/departments.php
	desc: 	Displays a list of departments in department table
*/
if(!empty($_GET["error"])) $errormessage='Department exists already';
else $errormessage='';
//message from adddepartment here
if(!empty($_GET["insert"])) $insert=$_GET["insert"];
else $insert='';
if($insert=='ok') $insertmessage='Department added into database';
elseif($insert=='error') $insertmessage='Could not insert into database';
else $insertmessage='';
//message from deletedepartment here
if(!empty($_GET["delete"])) $delete=$_GET["delete"];
else $delete='';
if($delete=='ok') $deletemessage='Department was removed from database';
elseif($delete=='error') $deletemessage='Could not delete from database';
else $deletemessage='';

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
	<h2>Personnel application - Administration - Departments</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		<a href="index.php">Admin home</a>
		<a href="users.php">Users</a>
		<a href="persons.php">Persons</a>
		Departments
		<a href="logout.php">Logout</a>
	</p>
	<p>
		<?php echo "<p>$errormessage</p>" ?>
		<?php echo "<p>$insertmessage</p>" ?>
		<?php echo "<p>$deletemessage</p>" ?>
		<form action="adddepartment.php" method="post">
			Username: <input name="department" />
			<input type="submit" value="Add department" />
		</form>
	</p>
	<table>
		<tr>
			<th>DepID</th><th>Department</th><th>Options</th>
		</tr>
		<?php
		include('../db.php');
		$sql="SELECT * FROM department order by department";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			     echo '<tr>';
				 echo "<td>".$row['depID']."</td>";
				 echo "<td>".$row['department']."</td>";
				 echo "<td><a href='updateFormDep.php?depID=".$row['depID'];
				 echo "'>Update</a>";
				 echo "/ <a href='deleteDepartment.php?depID=".$row['depID'];
				 echo"'>Delete</a></td>";
				 echo "</tr>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();  //close the database connection (opened in db.php)
		?>
		</table>
 </body>
</html>