<?php
session_start();

require_once("connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM users WHERE id = :id";

    $query = $db->prepare($sql); 

    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if(!$user){
        header("Location: index.php");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Recherche de stage</title>
</head>
<body>
    <section id="section-user">
    <h1>Recherche de Stage</h1>

        <p>Statut de la recherche : <?= $user["statut_recherche"] ?></p>
        <p>Nom de l'entreprise : <?= $user["nom_entreprise"] ?></p>
        <p>Date de postulation : <?= $user["date_postuler"] ?></p>
        <p>Date de relance : <?= $user["date_relance"] ?></p>
        <p>Type depostulation : <?= $user["type_postulation"] ?></p>
        <p>Méthode depostulation : <?= $user["methode_postulation"] ?></p>
        <p>Intitule deposte : <?= $user["intitule_poste"] ?></p>
        <p>Type decontrat : <?= $user["type_contrat"] ?></p>
        <p>Adresse mail de contact : <?= $user["mail_contact"] ?></p>
        <p>Commentaires : <?= $user["commentaires"] ?></p>
    <div class="retour">
        <p><a href="index.php">Retour</a><br>
    </div>

</body>
</html>
