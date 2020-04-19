<?php
/*
	file:	logout.php
	desc:	removes all the session information
*/
session_start();
session_destroy();
header("location:../index.php");
?>