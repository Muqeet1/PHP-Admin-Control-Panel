<?php
/*
	file:	persons.inc
	Desc: 	Gets the list of persons from database personnel, table person
*/
include('db.php');
?>
		<h3>Personnel</h3>
		<h4>Persons and their departments</h4>

		<table class="table">
		<tr>
			<th>PersonID</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Salary</th><th>Department</th>
		</tr>
		<?php
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