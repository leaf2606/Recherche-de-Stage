<?php
session_start();

require_once("connect.php");

if(isset($_POST["login"])) {
    $email = $_POST["mail_contact"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM utilisateurs WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute(array(":email" => $email));
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // Vérification du mot de passe
        if(password_verify($password, $user["password"])) {
            // Connexion réussie
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            // Redirection vers une page sécurisée par exemple
            header("Location: dashboard.php");
            exit();
        } else {
            // Mot de passe incorrect
            $_SESSION["message"] = "Mot de passe incorrect";
            header("Location: login.php");
            exit();
        }
    } else {
        // Utilisateur non trouvé
        $_SESSION["message"] = "Utilisateur non trouvé";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connectez vous à votre compte</h1>

    <form action="index.php" method="post">
        
        <label for="username">Nom d'utilisateur</label>
        <input type="text" placeholder="Saisir un nom d'utilisateur" id="username" name="utilisateur" required><br><br>

        <label for="mail_contact">E-mail</label>
        <input type="email" placeholder="Entrez votre e-mail" id="mail_contact" name="mail_contact" required><br><br>

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Entrez votre Mot de passe" id="password" name="password" required>
        <input type="submit" value="Se connecter" name="login">
    </form>

        <a href="index.php">Retour</a>
        <a href="index.php">Déconnexion</a>

</body>
</html>

