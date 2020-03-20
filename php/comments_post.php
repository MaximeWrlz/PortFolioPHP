<?php

session_start();
include_once("code.php");

$user = new Users;
$com = new Comments;

if (isset($_SESSION["account"]["username"])) {
	if (isset($_POST["valid"]) && $_POST["valid"] === "OK") {
		$userid = $_SESSION["account"]["username"];
		$com->add_comment($userid, $_POST['comment']);
	}
}
else {header('Location: ../index.php');}

?>