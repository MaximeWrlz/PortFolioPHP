<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
    <p><?php if(isset($_SESSION["account"]["username"]))
    {
        echo("Bonjour <b>" . $_SESSION["account"]["username"] . "</b>");
    }
    else
    {
        echo "Vous n'êtes pas connecté.";
    }
        ?></p>

    <br>
    <?php
        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            echo($w["title"]);
            echo("|");
            echo($w["description"] . "<br>");
        }

    ?>
    <br><br>
    <a href="login.php">Connecxion / Inscription</a>
    <br><br>
    <a href="logout.php">Déconnexion</a>
</body>
</html>