<?php 
require("database.php");

class Users {
	function get_user($id)
	{
		global $db;

		$request = "SELECT * FROM users WHERE id=$id";
		$resultat = $db->query($request);
		$user = $resultat->fetch();

		return($user);
	}

	function connect($username, $password)
	{
		global $db;

		$request = "SELECT * FROM users WHERE username=\"$username\"";
		$resultat = $db->query($request);
		$user = $resultat->fetch();

		if(password_verify($password, $user["password"])){
			session_start();
			$_SESSION["account"] = [
				'id' => $user["id"],
				'username' => $user["username"]
			];
			header('Location: index.php');
		}
		else{
			echo "Impossible de se connecter ou identifiants incorrects !";
		}
	}
}
?>