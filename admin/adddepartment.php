<?php
/*
	file:	adddepartment.php
	desc:	Adds the departmet into database 
*/

if(empty($_POST)) header('location:departments.php');
else{
 include('../db.php');
 $department=$_POST['department'];
 //check that department does not exist
 $sql="select department from department where department='$department' ";
 $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//department name is already in use
		header("location:departments.php?error=true");
	}else{
		//department available, insert into table department
		$department=mysql_real_escape_string($department);
		$sql="insert into department(department) ";
		$sql.="values('$department')";
		if($conn->query($sql)===TRUE){
			//insert was successful!
			header("location:departments.php?insert=ok");
		}else header("location:departments.php?insert=error");
	}
}
?>