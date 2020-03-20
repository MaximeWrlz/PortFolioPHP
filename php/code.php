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


    function inscription_checkmail($mail)
    {
        global $db;

        $reqmail = $db->prepare("SELECT * FROM users WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();

        return($mailexist);

    }

    function inscription_checkuser($uname)
    {
        global $db;

        $requser = $db->prepare("SELECT * FROM users WHERE username = ?");
        $requser->execute(array($uname));
        $unameexist = $requser->rowCount();

        return($unameexist);

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


    function get_current_work($id)
    {
        global $db;

        $edit_work = $db->prepare('SELECT * FROM works WHERE id=?');
        $edit_work->execute(array($id));

        if ($edit_work->rowCount() == 1) {
            $edit_work = $edit_work->fetch();
        }

        return($edit_work);       
    }



    function create($title, $description, $imagename)
    {
        global $db;

        $request = $db->prepare('INSERT INTO works (title, description, project_image) VALUES (?, ?, ?)');
        $request->execute([$title, $description, $imagename]);

        header("Location: ../admin.php");
    }


    function update($title, $description, $imagename, $id)
    {
        global $db;

        $request = $db->prepare('UPDATE works SET title=?, description=?, project_image=? WHERE id=?');
        $request->execute([$title, $description, $imagename, $id]);

        header("Location: ../admin.php");
    }

}





class AboutMe {
    function get_desc()
    {
        global $db;

        $edit_about = $db->prepare('SELECT * FROM aboutme');
        $edit_about->execute(array());
        $edit_about = $edit_about->fetch();

        return($edit_about);
    }

    function update1($desc)
    {
        global $db;

        $request = $db->prepare('UPDATE aboutme SET descme=?');
        $request->execute([$desc]);

        header("Location: admin.php");
    }

    function update2($imagename, $desc)
    {
        global $db;

        $request = $db->prepare('UPDATE aboutme SET about_image=?, descme=?');
        $request->execute([$imagename, $desc]);

        header("Location: admin.php");
    }

}





class Comments {
    function add_comment($pseudo, $message)
    {
        global $db;

        $newcomment = $db->prepare('INSERT INTO comments (pseudo, message, date) VALUES(?, ?, NOW())');
        $newcomment->execute(array($pseudo, $message));

        header("Location: ../index.php");
    }

    function display_comments()
    {
        global $db;

        $request = "SELECT id, pseudo, message, DAY(date) AS jour, MONTH(date) AS mois, YEAR(date) AS annee, HOUR(date) AS heure, MINUTE(date) AS minute FROM comments ORDER BY ID DESC";
        $resultat = $db->query($request);
        $comments = $resultat->fetchAll();

        return($comments);
    }

}
?>