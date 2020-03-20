<!DOCTYPE html>
<?php
session_start();
include_once("code.php");
// include("imageprocessform.php");

$work = new Works;


//SI FROM VALIDE:
if(isset($_POST["valid"]))
{
    if($_POST["valid"] === "OK")
    {
        if($_POST['title'] != NULL && $_POST['desc'] != NULL)
        {
            $profileImageName = $_FILES['projectimage']['name'];
            $tempProfileImage = $_FILES['projectimage']['tmp_name'];
            $target = "../images/projects/";
            move_uploaded_file($tempProfileImage, $target.$profileImageName);

            $work->create($_POST["title"], $_POST["desc"], $profileImageName);
        }
        else
        {
            echo("Remplis le formulaire");
        }
    }
}


?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

    <h3>Nouveau Projet</h3>

    <form action="create_work" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="title"><b>Titre:</b></label>
            <input type="text" placeholder="Titre" name="title" required>
            <br><br>
            <label for="desc"><b>Description:</b></label>
            <input type="text" placeholder="Description" name="desc" required>
            <br><br>
            <label for="projectimage"><b>Image:</b></label>
            <input type="file" name="projectimage" required>
            <br><br>
            <button type="submit" name="valid" value="OK">Valider</button>
        </div>
    </form>
</body>
</html>