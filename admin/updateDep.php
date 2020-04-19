<?php
/*
	file:	updateDep.php
	desc:	Updates the department name for selected department
*/
if(empty($_POST)) header("location:departments.php");
else{
	include('../db.php');
	$depID=$_POST["depID"];
	$department=mysql_real_escape_string($_POST["department"]);
	$sql="update department set department='$department' where depID=$depID";
	if($conn->query($sql)===TRUE){
		//updated
		header("location:updateFormDep.php?depID=$depID&update=true");
	}else header("location:departments.php");
}
?>