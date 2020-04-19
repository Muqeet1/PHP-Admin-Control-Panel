<?php
/*
	file:	admin/persons.php
	desc: 	Displays a list of persons in person table
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
	<h2>Personnel application - Administration - Persons</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		<a href="index.php">Admin home</a>
		<a href="users.php">Users</a>
		Persons
		<a href="departments.php">Departments</a>
		<a href="logout.php">Logout</a>
	</p>
	<p><a href="addFormPerson.php">Add New Person</a></p>
	<table>
	 <tr>
		<th>PersonID</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Salary</th><th>Department</th>
	 </tr>
	 <?php
	 include('../db.php'); //use db.php from one folder up
	 $sql="SELECT * FROM person inner join placement on person.personID=placement.personID ";
	 $sql.="inner join department on placement.depID=department.depID order by lastname, firstname";
	 $result = $conn->query($sql);
	 if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		     echo '<tr>';
			 echo "<td>".$row['personID']."</td>";
			 echo "<td>".$row['firstname']."</td>";
			 echo "<td>".$row['lastname']."</td>";
			 echo "<td>".$row['email']."</td>";
			 echo "<td>".$row['salary']."</td>";
			 echo "<td>".$row['department']."</td>";
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