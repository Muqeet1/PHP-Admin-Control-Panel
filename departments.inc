<?php
/*
	file:	departments.inc
	Desc: 	Gets the list of persons from database personnel, table person
*/
include('db.php');
?>
		<h3>Personnel</h3>
		<h4>Departments</h4>

		<table class="table">
		<tr>
			<th>DepID</th><th>Department</th>
		</tr>
		<?php
		$sql="SELECT * FROM department order by department";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			     echo '<tr>';
				 echo "<td>".$row['depID']."</td>";
				 echo "<td>".$row['department']."</td>";
				 echo "</tr>";
			}
		} else {
			echo "0 results";
		}
		$conn->close();  //close the database connection (opened in db.php)
		?>
		</table>