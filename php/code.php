<?php
require("database.php");

class Users {
    function get_user($id)
    {
        global $db;

        $request = "SELECT * FROM users WHERE id=$id";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        return($user);
    }


    function connect($username, $password)
    {
        global $db;
        $request = "SELECT * FROM users WHERE username=\"$username\"";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        if(password_verify($password, $user["password"]))
        {
            session_start();
            $_SESSION["account"] = [
                'id' => $user["id"],
                'username' => $user["username"]
            ];

            header('Location: index.php');
        }
        else
        {
            echo("Impossible de se connecter, identifiants incorrects !");
        }
    }


    function inscription_check($mail)
    {
        global $db;

        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();

        return($mailexist);

    }


    function inscription($username, $mail, $password)
    {
        global $db;

        $request = $db->prepare('INSERT INTO users (username, mail, password) VALUES (?, ?, ?)');
        $request->execute([$username, $mail, $password]);

        echo('Votre compte à  bien été créé ! Vous pouvez à présent vous connecter.');
    }
}





class Works {
    function get_works()
    {
        global $db;

        $request = "SELECT * FROM works";
        $resultat = $db->query($request);
        $work = $resultat->fetchAll();

        return($work);
    }


    function create($title, $description)
    {
        global $db;

        $request = $db->prepare('INSERT INTO works (title, description) VALUES (?, ?)');
        $request->execute([$title, $description]);
    }


    function update($title, $description, $id)
    {
        global $db;

        $request = $db->prepare('UPDATE works SET title=?, description=? WHERE id=?');
        $request->execute([$title, $description, $id]);
    }

}
?>