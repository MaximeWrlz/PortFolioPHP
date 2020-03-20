<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
$aboutme = new AboutMe;
$com = new Comments;
$desc = $aboutme->get_desc();
$allworks = $work->get_works();
$comments = $com->display_comments();
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <title>PortFolio PHP</title>
</head>
<body>

    <div id="container">

        <!-- BARRE DE NAVIGATION & CONNEXION -->
        <div class="navbar">
            <h1>Maxime Warluzel - PortFolio</h1>
            <div class="logs">
                <!-- SI CONNECTE AFFICHAGE DU MESSAGE DE BVN OU NON -->
                <?php
                    if(isset($_SESSION["account"]["username"]))
                    {
                        ?>
                        <p>
                            <?php echo("Bonjour <b>" . $_SESSION["account"]["username"] . "</b>"); ?>
                            <?php 
                                if ($_SESSION["account"]["username"] == "max.wrlz") {
                                    ?><a href="admin.php" class="admin">Admin Area</a><?php
                                }
                            ?>
                            <a href="php/logout.php">Logout</a>    
                        </p>                        
                        <?php
                    }
                    else {
                        ?>
                        <p>
                            <?php echo "Vous n'êtes pas connecté."; ?>
                            <a href="login.php">Login / Sign In</a>
                        </p>
                        <?php
                    }
                ?>
            </div>
        </div>

        
        <div class="separation"></div>


        <!-- SECTION ABOUT -->
        <div id="about">
            <h2>A Propos de moi</h2>
            <div class="aboutme">
                <img src="images/about/<?php echo $desc['about_image']; ?>"><br>        
                <p><?php echo($desc['descme']); ?></p>
            </div>
        </div>


        <div class="separation"></div>


        <!-- SECTION PROJETS -->
        <div id="projects">
            <h2>Mes projets</h2>
            <div class="projects-gallery">
                <?php
                    foreach($allworks as $w)
                    { ?>
                        <div class="project">
                            <img src="images/projects/<?php echo $w['project_image']; ?>">
                            <p class="title"><?php echo($w["title"]); ?></p>
                            <?php                           
                                $string = $w["description"];
                                if (strlen($w["description"]) > 65) {
                                    $stringCut = substr($string, 0, 65);
                                    $endPoint = strrpos($stringCut, ' ');
                                    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $string .= '...';
                                }
                            ?>
                            <p class="description"><?php echo($string); ?></p>
                            <a href="work.php?WorkID=<?=$w[0]?>">Voir plus...</a>
                        </div>
                    <?php }
                ?>
            </div>
        </div>

        <div class="separation"></div>


        <!-- ESPACE COMMENTAIRES -->
        <div id="comments">
            <h2>Commentaires</h2>
            <?php 
            if (isset($_SESSION["account"]["username"])) { ?>
                <form action="php/comments_post.php" method="post">
                    <input type="text" name="comment" placeholder="New comment..." required>
                    <button type="submit" name="valid" value="OK">Envoyer</button>  
                </form>
            <?php }
            else {echo "Vous devez être connecté pour poster un commentaire.";} ?>
            <div class="posts">
                <?php 
                foreach ($comments as $c) { ?>
                <!-- echo '<p class="comentaire"><font color="gray">' . '[Le ' . $c['jour'] . '/' . $c['mois'] . '/' . $c['annee'] . ' à ' . $c['heure'] . 'h' . $c['minute'] . 'min ' . '</font>' . '<strong><font color="#FFD700">' . htmlspecialchars($c['pseudo']) . '</font></strong> : ' .  htmlspecialchars($c['message']) . '</p>'; -->
                
                <div class="comment">
                    <div class="comment_infos">
                        <p class="comment_date"><?php echo '[' . $c['jour'] . '.' . $c['mois'] . '.' . $c['annee'] . ' - ' . $c['heure'] . 'h' . $c['minute'] . 'min]'; ?></p>
                        <p class="comment_pseudo"><?php echo(htmlspecialchars($c['pseudo'])); ?></p>
                    </div>
                    <p class="comment_message"><?php echo htmlspecialchars($c['message']); ?></p>
                </div>
                <?php 
                if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "max.wrlz") {
                    ?>
                    <a href="php/delete_comments.php?CommentID=<?= $c['id'];?>" onclick="return confirm('Voulez-vous vraiment supprimer ce commetaire ?');">Supprimer</a>
                    <?php
                }
                ?>             
            <?php } ?>
            </div>
        </div>

        <div class="separation"></div>
    </div>

</body>
</html>