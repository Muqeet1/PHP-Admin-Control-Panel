<?php
/*
	file:	deleteuser.php
	desc:	Deletes a user row from table user by its userID-field
			given in the url of this script
*/
if(!isset($_GET['userID'])) header('location:users.php');
else{
	$userID=$_GET['userID'];
	include('../db.php');
	$sql="delete from user where userID=$userID";
	if($conn->query($sql)===TRUE){
		//deleted
		header("location:users.php?delete=ok");
	}else header("location:users.php?delete=error");
}
?>