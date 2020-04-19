<?php
/*
	file:	deleteDepartment.php
	Desc:	Deletes the department -> placements first!!!!
*/
if(!isset($_GET['depID'])) header('location:departments.php');
else{
	$depID=$_GET['depID'];
	include('../db.php');
	//first connections between persons<->department
	$sql="delete from placement where depID=$depID";
	$conn->query($sql);
	//then department
	$sql="delete from department where depID=$depID";
	if($conn->query($sql)===TRUE){
		//deleted all connections!
		header("location:departments.php?delete=ok");
	}else header("location:departments.php?delete=error");
}
?>