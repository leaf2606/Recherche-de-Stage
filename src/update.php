<?php

if($_POST) {
    if(
        isset($_POST["id"]) && !empty($_POST["id"])
        && isset($_POST["statut_recherche"]) && !empty($_POST["statut_recherche"])
        && isset($_POST["nom_entreprise"]) && !empty($_POST["nom_entreprise"])
        && isset($_POST["date_postuler"]) && !empty($_POST["date_postuler"])
        && isset($_POST["date_relance"]) && !empty($_POST["date_relance"])
        && isset($_POST["type_postulation"]) && !empty($_POST["type_postulation"])
        && isset($_POST["methode_postulation"]) && !empty($_POST["methode_postulation"])
        && isset($_POST["intitule_poste"]) && !empty($_POST["intitule_poste"])
        && isset($_POST["type_contrat"]) && !empty($_POST["type_contrat"])
        && isset($_POST["mail_contact"]) && !empty($_POST["mail_contact"])
        && isset($_POST["commentaires"]) && !empty($_POST["commentaires"])
    
    ){
        require_once("connect.php");

        $id = strip_tags($_POST["id"]);
        $statut_recherche = strip_tags($_POST["statut_recherche"]);
        $nom_entreprise = strip_tags($_POST["nom_entreprise"]);
        $date_postuler = strip_tags($_POST["date_postuler"]);
        $date_relance = strip_tags($_POST["date_relance"]);
        $type_postulation = strip_tags($_POST["type_postulation"]);
        $methode_postulation = strip_tags($_POST["methode_postulation"]);
        $intitule_poste = strip_tags($_POST["intitule_poste"]);
        $type_contrat = strip_tags($_POST["type_contrat"]);
        $mail_contact = strip_tags($_POST["mail_contact"]);
        $commentaires = strip_tags($_POST["commentaires"]);

        $sql = "UPDATE users SET statut_recherche = :statut_recherche, nom_entreprise = :nom_entreprise,
        date_postuler = :date_postuler, date_relance = :date_relance, type_postulation = :type_postulation,
        methode_postulation = :methode_postulation, intitule_poste = :intitule_poste, type_contrat = :type_contrat,
        mail_contact = :mail_contact, commentaires = :commentaires WHERE id = :id";
    
        $query = $db->prepare($sql);

        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":statut_recherche", $statut_recherche, PDO::PARAM_STR);
        $query->bindValue(":nom_entreprise", $nom_entreprise, PDO::PARAM_STR);
        $query->bindValue(":date_postuler", $date_postuler, PDO::PARAM_STR);
        $query->bindValue(":date_relance", $date_relance, PDO::PARAM_STR);
        $query->bindValue(":type_postulation", $type_postulation, PDO::PARAM_STR);
        $query->bindValue(":methode_postulation", $methode_postulation, PDO::PARAM_STR);
        $query->bindValue(":intitule_poste", $intitule_poste, PDO::PARAM_STR);
        $query->bindValue(":type_contrat", $type_contrat, PDO::PARAM_STR);
        $query->bindValue(":mail_contact", $mail_contact, PDO::PARAM_STR);
        $query->bindValue(":commentaires", $commentaires, PDO::PARAM_STR);
        

        $query->execute();
        header("Location: index.php"); 

    } else {
        echo "Remplissez le formulaire !";
    }
}

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
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire</title>
</head>
<body>
<h1>Modifier</h1>
    <form method="post">
    <input type="hidden" name="id" value="<?= $user["id"] ?>">

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
        
        <label>Date de relance <code></code></label>
        <input type="date" name="date_relance" required><br><br>
        
        <label id="type_postulation">Type de postulation:</label>
        <select name="type_postulation" id="type_postulation" value="<?= $user["type_postulation"] ?>" required>
            <option>Spontanée</option>
            <option>Réponse à une offre</option>
            <option>Recommandation</option>
            <option>Sollicitation directe</option>
        </select><br><br>
        
        <label id="methode_postulation">Type de postulation:</label>
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
    </form>
    <a href="index.php">Retour</a>

    <?php
    // print_r($_POST);
    ?>

</body>
</html>