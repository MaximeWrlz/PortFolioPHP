<!DOCTYPE html>
<?php
session_start();
include_once("code.php");
$work = new Works;

if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "max.wrlz") {

    if (isset($_GET['WorkID'])) {

        //RECUPERATION DES INFOS DU PROJET EN QUESTION:
        $workid = $_GET['WorkID'];
        $edit_work = $work->get_current_work($workid);
        
        //SI FORM VALIDE:
        if (isset($_POST['valid']) && $_POST['valid'] === "OK") {
            if ($_POST['title'] != NULL && $_POST['desc'] != NULL) {

                $profileImageName = $_FILES['projectimage']['name'];
                $tempProfileImage = $_FILES['projectimage']['tmp_name'];
                $target = "../images/projects/";
                move_uploaded_file($tempProfileImage, $target.$profileImageName);

                $work->update($_POST["title"], $_POST["desc"], $profileImageName, $workid);
            }
        }
    }
    else {
        die('Erreur: le projet concerné n\'existe pas !');
    }
}
else {
    header('Location: index.php');
}

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

    <form action="edit_work.php?WorkID=<?php echo $workid; ?>" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="title"><b>Titre:</b></label>
            <input type="text" placeholder="Titre" name="title" value="<?= $edit_work['title'] ?>" required>
            <br><br>
            <label for="desc"><b>Description:</b></label>
            <input type="text" placeholder="Description" name="desc" value="<?= $edit_work['description'] ?>" required>
            <br><br>
            <label for="projectimage"><b>Image:</b></label>
            <input type="file" name="projectimage" required>
            <br><br>
            <button type="submit" name="valid" value="OK">Valider</button>
        </div>
    </form>
</body>
</html>