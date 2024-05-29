<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire</title>
</head>
<body>
    <h1>Ajoutez une entreprise</h1>
    <form action="create.php" method="post">
        <label id="statut_recherche">Statut de la recherche:</label>
        <select name="statut_recherche" id="statut_recherche" value="<?= $user["statut_recherche"] ?>" required>
            <option>A postulé</option>
            <option>Ne correspond pas</option>
            <option>Entretien</option>
            <option>Offre</option>
            <option>Refus</option>
            <option>Embauche</option>
            <option>Pas de réponse</option>
            <option>Relancé</option>
        </select><br><br>

        <label for="nom_entreprise">Nom de l'entreprise</label>
        <input type="text" name="nom_entreprise" required><br><br>
        
        <label>Date de postulation <code></code></label>
        <input type="date" name="date_postuler" required><br><br>
        
        <label for="date_relance">Date de relance :</label>
        <input type="date" id="date_relance" name="date_relance" required>
        <input type="checkbox" id="ajouter_jours" onchange="miseAJour()"> +7 jours<br><br>
        
        <label id="type_postulation">Type de postulation:</label>
        <select name="type_postulation" id="type_postulation" value="<?= $user["type_postulation"] ?>" required>
            <option>Spontanée</option>
            <option>Réponse à une offre</option>
            <option>Recommandation</option>
            <option>Sollicitation directe</option>
        </select><br><br>
        
        <label id="methode_postulation">Méthode de postulation:</label>
        <select name="methode_postulation" id="methode_postulation" value="<?= $user["methode_postulation"] ?>" required>
            <option>En personne</option>
            <option>E-mail</option>
            <option>LinkedIn</option>
            <option>Job board</option>
            <option>Website</option>
            <option>Recommandation</option>
            <option>Sollicitation directe</option>
        </select><br><br>
        
        <label for="intitule_poste">Intitulé du poste</label>
        <input type="text" name="intitule_poste" required><br><br>
        
        <label id="type_contrat">Type de postulation:</label>
        <select name="type_contrat" id="type_contrat" value="<?= $user["type_contrat"] ?>" required>
            <option>Stage</option>
            <option>CDD</option>
            <option>CDI</option>
            <option>Apprentissage</option>
            <option>Freelance</option>
        </select><br><br>
        
        <label for="mail_contact">Adresse-mail de contact</label>
        <input type="e-mail" id="mail_contact" name="mail_contact" required><br><br>
        
        <label for="commentaires">Commentaires:</label>
        <textarea name="commentaires" id="commentaires"></textarea><br><br>
        
        <button>Ajouter</button>

        <a href="index.php">Retour</a>
        <!-- <?php print_r($_POST); ?> -->

</body>
</html>