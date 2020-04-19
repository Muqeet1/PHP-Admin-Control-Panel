<?php
/*
	file:	adduser.php
	desc:	Adds the user into database with generated password
			if the username does not already exist
*/
function genRndString($length = 10, $chars = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    if($length > 0)
    {
        $len_chars = (strlen($chars) - 1);
        $the_chars = $chars{rand(0, $len_chars)};
        for ($i = 1; $i < $length; $i = strlen($the_chars))
        {
            $r = $chars{rand(0, $len_chars)};
            if ($r != $the_chars{$i - 1}) $the_chars .=  $r;
        }
        return $the_chars;
    }
}

if(empty($_POST)) header('location:users.php');
else{
 include('../db.php');
 $username=$_POST['username'];
 //check that username does not exist
 $sql="select username from user where username='$username' ";
 $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		//username is already in use
		header("location:users.php?error=true");
	}else{
		//username available, insert into table user
		$username=mysql_real_escape_string($username);
		$password=genRndString(); //generates a random string
		$sql="insert into user(username,password) ";
		$sql.="values('$username','$password')";
		if($conn->query($sql)===TRUE){
			//insert was successful!
			header("location:users.php?insert=ok");
		}else header("location:users.php?insert=error");
	}
}
?>





