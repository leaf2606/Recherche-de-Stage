<?php
 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire</title>
    
</head>
<body>

<div class="container-form">

<h1>Ajoutez une entreprise</h1>

<form action="create.php" method="post">

    <label id="statut_recherche">Statut de la recherche : </label>
    <select name="statut_recherche" id="statut_recherche" placeholder="Recherche de stage" value="<?= $user["statut_recherche"] ?>" required>
        <option>A postulé</option>
        <option>Ne correspond pas</option>
        <option>Entretien</option>
        <option>Offre</option>
        <option>Refus</option>
        <option>Embauche</option>
        <option>Pas de réponse</option>
        <option>Relancé</option>
    </select><br><br>

    <label for="nom_entreprise">Nom de l'entreprise :</label>
    <input type="text" name="nom_entreprise" placeholder="Nom de l'entreprise" required><br><br>

    <label>Date de postulation :<code></code></label>
    <input type="date" name="date_postuler" required><br><br>

    <label for="date_relance">Date de relance :</label>
    <input type="date" id="date_relance" name="date_relance" required>
    <input type="checkbox" id="ajouter_jours" onchange="miseAJour()"> +7 jours<br><br>

    <label id="type_postulation">Type de postulation</label>
    <select name="type_postulation" placeholder="Type de postulation" id="type_postulation" value="<?= $user["type_postulation"] ?>" required>
        <option>Spontanée</option>
        <option>Réponse à une offre</option>
        <option>Recommandation</option>
        <option>Sollicitation directe</option>
    </select><br><br>

    <label id="methode_postulation">Méthode de postulation</label>
    <select name="methode_postulation" placeholder="Méthode de postulation" id="methode_postulation" value="<?= $user["methode_postulation"] ?>" required>
        <option>En personne</option>
        <option>E-mail</option>
        <option>LinkedIn</option>
        <option>Job board</option>
        <option>Website</option>
        <option>Recommandation</option>
        <option>Sollicitation directe</option>
    </select><br><br>

    <label for="intitule_poste">Intitulé du poste</label>
    <input type="text" name="intitule_poste" placeholder="Intitulé du poste" required><br><br>

    <label id="type_contrat">Type de contrat</label>
    <select name="type_contrat" placeholder="Type de contrat" id="type_contrat" value="<?= $user["type_contrat"] ?>" required>
        <option>Stage</option>
        <option>CDD</option>
        <option>CDI</option>
        <option>Apprentissage</option>
        <option>Freelance</option>
    </select><br><br>

    <label for="mail">E-mail :</label>
    <input type="email" id="mail" placeholder="E-mail" name="mail_contact"><br><br>

    <label for="commentaires">Commentaires :</label>
    <textarea name="commentaires" placeholder="Commentaires" id="commentaires"></textarea><br><br>

        <button>Ajouter</button>

    <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"]?>">
        <a href="index.php" class="button">Retour</a>

    </form>

</div>    
</body>
</html>