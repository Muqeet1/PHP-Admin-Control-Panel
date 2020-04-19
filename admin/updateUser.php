<?php
/*
	file:	updateUser.php
	desc:	Updates the password for selected user
*/
if(empty($_POST)) header("location:users.php");
else{
	include('../db.php');
	$userID=$_POST["userID"];
	$password=mysql_real_escape_string($_POST["password"]);
	$sql="update user set password='$password' where userID=$userID";
	if($conn->query($sql)===TRUE){
		//updated
		header("location:updateFormUser.php?userID=$userID&update=true");
	}else header("location:users.php");
}
?>