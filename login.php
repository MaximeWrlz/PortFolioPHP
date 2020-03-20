<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;

//SI DEJA CONNECTE:
if(isset($_SESSION["account"]["id"]))
{
    header('Location: index.php');
}

//SI FORM DE CONNEXION VALIDE/
if(isset($_POST["login"]))
{
    if($_POST["login"] === "OK")
    {
        if($_POST['uname_connect'] != NULL && $_POST['psw_connect'] != NULL)
        {
            $user->connect($_POST["uname_connect"], $_POST["psw_connect"]);
        }
        else
        {
            echo("Remplis le formulaire");
        }
    }
}

//SI FORM D'INSCRIPTION VALIDE:
if (isset($_POST['signin'])) {
    if ($_POST["signin"] === "OK") {
        if ($_POST['uname'] != NULL && $_POST['mail'] != NULL && $_POST['mailconfirm'] != NULL && $_POST['psw'] != NULL && $_POST['pswconfirm'] != NULL) {
            $unamecheck = $user->inscription_checkuser($_POST['uname']);
            if ($unamecheck == 0) {
                if ($_POST['mail'] == $_POST['mailconfirm']) {
                    $mailcheck = $user->inscription_checkmail($_POST['mail']);
                    if ($mailcheck == 0) {
                        if ($_POST['psw'] == $_POST['pswconfirm']) {
                            $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
                            $user->inscription($_POST['uname'], $_POST['mail'], $password);
                        }
                        else {echo("les mdp ne sont pas identiques");}
                    }
                    else {echo("Il exite déjà un compte avec cette adresse mail");}
                }
                else {echo("Les mails ne sont pas identiques");}
            }
            else {echo("Ce pseudo est déjà utilisé");}
        }
    }
}


?>
<html lang="fr">
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div id="container">
        <div id="connection">
            <h3>Connection</h3>
            <form action="login.php" method="post">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Username" name="uname_connect" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Password" name="psw_connect" required>

                <button type="submit" name="login" value="OK">Login</button>
            </form>
        </div>

        <div id="inscription">
            <h3>Inscription</h3>
            <form action="login.php" method="post">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Username" name="uname" required>

                <label for="uname"><b>Mail</b></label>
                <input type="mail" placeholder="Mail" name="mail" required>
                <input type="mail" placeholder="Confirm Mail" name="mailconfirm" required class="confirm-input">

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Password" name="psw" required>
                <input type="password" placeholder="Confirm Password" name="pswconfirm" required class="confirm-input">

                <button type="submit" name="signin" value="OK">Sign In</button>
            </form>
        </div>        
    </div>

</body>
</html>