<?php
/*
	file:	admin/addPerson.php
	desc:	Adds a new person into database. 
			Person name etc into person -table 
			and personID and depID into placement -table
*/

//read all form fields 
$error=false;
if(!empty($_POST["firstname"])) $firstname=$_POST["firstname"];
else{
	$error=true;
}
if(!empty($_POST["lastname"])) $lastname=$_POST["lastname"];
else{
	$error=true;
}
if(!empty($_POST["email"])) $email=$_POST["email"];
else{
	$error=true;
}
if(!empty($_POST["salary"])) $salary=$_POST["salary"];
else{
	$error=true;
}
if(!empty($_POST["department"])) $department=$_POST["department"];
else{
	$error=true;
}
include('../db.php');
session_start();
$_SESSION["message"]=''; //displays message in addFormPerson.php
//insert the person if no error
if($error){
	$_SESSION["message"]='Check the fields!';
	header("location:addFormPerson.php");
}
else{
	//insert into person
	$sql="insert into person(firstname,lastname,email,salary) ";
	$sql.="values('$firstname','$lastname','$email',$salary)";
	if($conn->query($sql)===TRUE){
	 //get the latest personID from table using: $last_id = $conn->insert_id;
	 $last_id = $conn->insert_id;
	 //insert personID  +  depID into placements
	 $sql="insert into placement(depID,personID) ";
	 $sql.="values($department,$last_id)";
	 if($conn->query($sql)===TRUE){
		//everything inserted into database
		$_SESSION["message"]='Person inserted successfully!';
	 }else $_SESSION["message"]='Could not assign a department!';
	}else $_SESSION["message"]='Could not insert into database!';
	header("location:addFormPerson.php");
}
?>



