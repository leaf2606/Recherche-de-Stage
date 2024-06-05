<?php

session_start();
// echo $_SESSION["user_id"];

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
    <section id="section-profil">
    <h1>Profil de <?= $_SESSION["mdp"]["username"] ?></h1>

    <p>Pseudo : <?= $_SESSION["mdp"]["username"] ?></p>
    <p>E-MAIL : <?= $_SESSION["mdp"]["email"] ?></p>
    </section>
    <div class="retour-2">
    <a href="index.php">Retour</a>
    </div>
</body>
</html>