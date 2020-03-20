<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
$aboutme = new AboutMe;
$about = $aboutme->get_desc();
$allworks = $work->get_works();

if (isset($_SESSION["account"]["username"]) && $_SESSION["account"]["username"] == "max.wrlz") {

	//SI FROM ABOUT VALIDE:
	if(isset($_POST["SaveAboutme"]))
	{
	    if($_POST["SaveAboutme"] === "OK")
	    {
	        if($_POST['AboutmeDesc'] != NULL)
	        {
	        	if ($_FILES['aboutmeimagemodif']['size'] == 0) {
	        		$aboutme->update1($_POST["AboutmeDesc"]);
	        	}
	        	else {
	        		$aboutImageName = $_FILES['aboutmeimagemodif']['name'];
	        		$tempAboutImage = $_FILES['aboutmeimagemodif']['tmp_name'];
	        		$target = "images/about/";
	        		move_uploaded_file($tempAboutImage, $target.$aboutImageName);
	            	$aboutme->update2($aboutImageName, $_POST["AboutmeDesc"]);
	        	}
	        }
	    }
	}

}
else {header('Location: index.php');}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Maxime Warluzel | Admin Page</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div id="container-admin">
		
		<!-- DECONNEXION -->
		<div class="navbar">
			<h3>Admin Area</h3>
			<a href="php/logout.php">Logout</a>
		</div>

		<!-- PROFIL ADMIN -->
		<div class="profile">
			<img src="images/profilimg.png">
			<p><?php echo("Bonjour <b>" . $_SESSION["account"]["username"] . "</b> !"); ?></p>
			<a href="index.php">Retour à l'accueil</a>
		</div>

		<div class="separation"></div>

		<!-- SECTION ABOUT -->
		<div class="aboutme">
			<h2>Section About...</h2>
			<form action="admin.php" method="post" enctype="multipart/form-data">
				<div class="main-form-about">
					<div class="aboutme-img">
						<img id="aboutmeimage" src="images/about/<?php echo $about['about_image']; ?>" onclick="triggerClick();">
						<p>Cliquer sur l'image pour la modifier</p>
						<input type="file" name="aboutmeimagemodif" onchange="loadfile(event)" id="aboutmeimagemodif" style="display: none;">
					</div>
					<div class="aboutme-desc">
						<textarea name="AboutmeDesc" required><?php echo($about['descme']); ?></textarea>
					</div>
				</div>				
				<button type="submit" name="SaveAboutme" value="OK">Sauvegarder</button>
			</form>
		</div>

		<div class="separation"></div>

		<!-- SECTION PROJECTS -->
		<div class="projects">
			<h2>Section Projects...</h2>
			<a href="php/create_work.php" class="new">Nouveau Projet</a>
			<div class="projects-gallery">
				<?php 
					foreach($allworks as $w)
					{ ?>
						<div class="project">
							<img src="images/projects/<?php echo $w['project_image']; ?>">
							<p class="title"><?php echo($w["title"]); ?></p>
							<?php 							
								$string = $w["description"];
								if (strlen($w["description"]) > 35) {
									$stringCut = substr($string, 0, 35);
									$endPoint = strrpos($stringCut, ' ');
									$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
									$string .= '...';
								}
							?>
							<p class="description"><?php echo($string); ?></p>
							<a href="work.php?WorkID=<?=$w[0]?>">Voir plus...</a>
							<div class="buttons">
								<a href="php/edit_work.php?WorkID=<?=$w[0]?>" class="modif">Modifier</a>
								<a href="php/delete_work.php?WorkID=<?=$w[0]?>" class="supp" onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?');">Supprimer</a>
							</div>
						</div>
					<?php }
				?>
			</div>
		</div>

		<div class="separation"></div>

	</div>

	<script src="js/admin.js"></script>

</body>
</html>