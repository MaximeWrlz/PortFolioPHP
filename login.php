<!DOCTYPE html>

<?php
session_start();
include_once("php/code.php");

$user = new Users;
if (isset($_SESSION["account"])){
	header('Location: index.php');
}
if(isset($_POST['submit'])){
	if ($_POST['submit'] === "OK")
	{
		if ($_POST['uname'] != NULL && $_POST['psw'] != NULL)
		{
			$user->connect($_POST["uname"], $_POST["psw"]);
		}
	}
	else{echo "Remplis le formulaire";}
}

?>

<html>
<head>
	<title>Login Page</title>
	<meta charset="utf-8">
</head>
<body>

	<form action="login.php" method="post">

	  <div class="container">
	    <label for="uname"><b>Username</b></label>
	    <input type="text" placeholder="Enter Username" name="uname" required>

	    <label for="psw"><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="psw" required>

	    <button type="submit" name="submit" value="OK">Login</button>
	  </div>
	</form>

</body>
</html>