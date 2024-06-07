<?php

session_start();

if(!empty($_POST)){
    // var_dump($_POST);
    if(isset($_POST["username"], $_POST["email"], $_POST["password"])
        && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])
    ){

        $username = strip_tags($_POST["username"]);
        $email = $_POST["email"];
        $password = $_POST["password"];


        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            // die("L'adresse email est incorrecte");
        }
    
        $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
 
        // die($password);

        require_once("connect.php");

        $sql = "INSERT INTO `mdp` (`username`, `email`, `password`) VALUES (:username, :email, '$password')";

        $query = $db->prepare($sql);
        
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);

        $query->execute(); 

        $id =$db->lastInsertId();

        // var_dump($_SESSION);
        $_SESSION["mdp"] = [
            "id" => $id,
            "username" => $username,
            "email" => $_POST["email"]
        ];

        // var_dump($_SESSION);
        header("Location: profil.php");

    } else{
        die("Le formulaire est incomplet");
    }
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
    <div class="container-register">
    <section id="section-register">

        <h1>Créér un compte</h1>

    <form  method="post">

        <label for="username">Pseudo</label>
        <input type="text" placeholder="Saisir votre pseudo" id="username" name="username" required><br><br>
        
        <label for="email">E-mail</label>
        <input type="email" placeholder="Entrez votre e-mail" id="email" name="email"><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre Mot de passe" id="password" name="password" required>&ensp;&ensp;
        <button>S'inscrire</button>
    </form>
    
    </section>
        
        <div class="lien">
            <a href="index.php">Retour</a>
        </div>
    </div>
</body>
</html>
