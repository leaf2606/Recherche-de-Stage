<?php

session_start();

if(isset($_SESSION["mdp"])){
    header("Location: profil.php");
    exit;
}


if(!empty($_POST)){
        if(isset($_POST["email"], $_POST["password"])
            && !empty($_POST["email"] && !empty($_POST["password"]))
        ){
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                die("Ce n'est pas un email");
            }

            require_once("connect.php");

            $sql = "SELECT * FROM `mdp` WHERE `email` = :email";

            $query = $db->prepare($sql);

            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

            $query->execute();

            $mdp = $query->fetch();

            // var_dump($mdp);die;

            //Problème ici sois il va sur le profil sois il y a un message d'erreur //

            if(!$mdp){
                die("L'utilisateur et/ou le mot de passe est incorrect");
            }
        
            if(!password_verify($_POST["password"], $mdp["password"]));
                // die("L'utilisateur et/ou le mot de passe est incorrect");
        }

        // var_dump($_SESSION);
        $_SESSION["mdp"] = [
            "id" => $mdp["id"],
            "username" => $mdp["username"],
            "email" => $mdp["email"],
            "roles" => $mdp["roles"]
        ];

        // var_dump($_SESSION);
        header("Location: profil.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Inscription</title>
</head>
<body>
    <div class="container-login">
    <section id="section-login">
    <h1>Connectez-vous à votre compte</h1>

    <form  method="post">

        <label for="email">E-mail</label>
        <input type="email" placeholder="Entrez votre e-mail" id="email" name="email"><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre Mot de passe" id="password" name="password" required>&ensp;&ensp;
        <button>Se connecter</button>
    </form>
    </section>
    <div class="lien-login">
        <a href="index.php">Retour</a>
    </div>
    </div>
</body>
</html>

