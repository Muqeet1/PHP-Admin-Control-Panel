<?php
/*	file: login.inc
	desc: displays a login form and possible message from login.php*/
if(!empty($_GET["loginerror"])) $errormessage='<div class="alert alert-danger" role="alert">Error in login. Retype username and password</div>';else $errormessage='';
?>
<form class="form-signin" method="post" action="login.php">
 <h2 class="form-signin-heading">Please login</h2>
 <label for="username" class="sr-only">Username</label>
 <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
 <label for="inputPassword" class="sr-only">Password</label>
 <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
 <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
 <?php if(!$errormessage=='') echo $errormessage;?>
</form>