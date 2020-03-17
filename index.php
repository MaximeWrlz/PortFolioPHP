<!DOCTYPE html>

<?php 
session_start();
include_once("php/code.php");

$user = new Users;
?>

<html lang="fr">
<head>
	<title>php</title>
	<meta charset="utf-8">
</head>
<body>
	<p>Bonjour <?php echo($_SESSION["account"]["username"]); ?></p>
</body>
</html>