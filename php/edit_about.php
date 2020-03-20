<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");
global $db;
$aboutme = new AboutMe;

if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "max.wrlz") {
    
    //RECUPERATION DE LA DESCRIPTION:
    $desc = $aboutme->get_desc2();

    //SI FROM VALIDE:
    if(isset($_POST["valid"]))
    {
        if($_POST["valid"] === "OK")
        {
            if($_POST['description'] != NULL)
            {
                $profileImageName = $_FILES['projectimage']['name'];
                $tempProfileImage = $_FILES['projectimage']['tmp_name'];
                $target = "images/projects/";
                move_uploaded_file($tempProfileImage, $target.$profileImageName);
                
                $aboutme->update($_POST["description"]);
            }
        }
    }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition Biographie</title>
</head>
<body>

    <form action="edit_about.php" method="post">
        <div class="container">
            <label for="desc"><b>Description Personenelle:</b></label><br>
            <textarea style="width: 80%; height: 75px; margin-top: 20px; font-size: 16px;" placeholder="Description" name="description" required><?= $desc['descme']; ?></textarea>
            <br><br>
            <button type="submit" name="valid" value="OK">Valider</button>
        </div>
    </form>
</body>
</html>