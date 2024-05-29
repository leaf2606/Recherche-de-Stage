<?php

if(isset($_GET{"id"}) && !empty($_GET{"id"})) {

require_once("connect.php");

    // echo $_GET["id"];
$id = strip_tags($_GET["id"]);

$sql = "SELECT * FROM users WHERE id = :id";

$query = $db->prepare($sql); 
// On accroche la valeur id de la requête à celle de la variable $id //

$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch();

// On vérifie si l'utilisateur existe // 
 
if(!$user){
    header("Location: index.php");
} else {
    require_once("disconnect.php");
}

// print_r($user);

} else{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de stage</title>
</head>
<body>
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
    <p><a href="index.php">Retour</a><br><a href="update.php?id=<?= $user["id"] ?>">Modifier</a><br><a href="delete.php?id=<?= $user["id"] ?>">Supprimer</a></p>

</body>
</html>
