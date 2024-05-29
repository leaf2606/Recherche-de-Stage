<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motDePasse = $_POST['motDePasse'];
    // Faites quelque chose avec le mot de passe, comme le vérifier ou le traiter
session_start();
        $_SESSION['message'] = "Connexion Okay !";
        header("Location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer en compte</title>
</head>
<body>
    <section id="section-7">
    
        <h1>Votre compte</h1>

            <form action="index.php" method="post">
        
                <label for="utilisateur">Nom d'utilisateur</label>
                <input type="text" name="utilisateur" required><br><br>

                <label for="pass">Mot de passe</label>
                <input type="password"><br><br>
                <button type="submit">Se connecter</button>
        </form>
    
            <a href="index.php">Retour</a>
    
    </section>
</body>
</html>