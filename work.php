<?php
session_start();
include_once("php/code.php");

$work = new Works;
$workid = $_GET['WorkID'];
$current_work = $work->get_current_work($workid);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>Project Page</title>
</head>
<body>

    <div id="work_container">
        <h3><?php echo($current_work["title"]); ?></h3>
        <div class="work_separation"></div>
        <img src="images/projects/<?php echo $current_work['project_image']; ?>">
        <p><?php echo($current_work["description"]); ?></p>
        <div class="work_separation"></div>
        <a href="#"  onClick="javascript:history.go(-1)" >Retour...</a>
    </div>

</body>
</html>