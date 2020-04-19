<?php
/*
	file:	admin/users.php
	desc: 	Displays a list of users
*/
if(!empty($_GET["error"])) $errormessage='Username exists already';
else $errormessage='';
//message from adduser here
if(!empty($_GET["insert"])) $insert=$_GET["insert"];
else $insert='';
if($insert=='ok') $insertmessage='Username added into database';
elseif($insert=='error') $insertmessage='Could not insert into database';
else $insertmessage='';
//message from deleteuser here
if(!empty($_GET["delete"])) $delete=$_GET["delete"];
else $delete='';
if($delete=='ok') $deletemessage='User was removed from database';
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
	<h2>Personnel application - Administration - Users</h2>
	<h3>Welcome <?php echo $user?></h3>
	<p>
		<a href="index.php">Admin home</a>
		Users
		<a href="persons.php">Persons</a>
		<a href="departments.php">Departments</a>
		<a href="logout.php">Logout</a>
	</p>
	<p>
		<?php echo "<p>$errormessage</p>" ?>
		<?php echo "<p>$insertmessage</p>" ?>
		<?php echo "<p>$deletemessage</p>" ?>
		<form action="adduser.php" method="post">
			Username: <input name="username" />
			<input type="submit" value="Add user" />
		</form>
	</p>
	<table>
	 <tr>
		<th>UserID</th><th>Username</th><th>Password</th><th>Options</th>
	 </tr>
	<?php
	include('../db.php');
	$sql="SELECT * FROM user order by username";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		 echo '<tr>';
		 echo "<td>".$row['userID']."</td>";
		 echo "<td>".$row['username']."</td>";
		 echo "<td>".$row['password']."</td>";
		 echo "<td><a href='updateFormUser.php?userID=".$row['userID'];
		 echo "'>Update</a>";
		 if($user==$row['username'])echo "</td>";
		 else{
			echo " / <a href='deleteuser.php?userID=".$row['userID'];
			echo"'>Delete</a></td>";
		 }
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