<?php 
	require('database.php');

	$delete = $db->prepare('DELETE FROM comments WHERE id=?');
	$delete->execute([$_GET['CommentID']]);

	header('Location: ../index.php');
?>