<?php 
	require('database.php');

	$delete = $db->prepare('DELETE FROM works WHERE id=?');
	$delete->execute([$_GET['WorkID']]);

	header('Location: ../admin.php');
?>