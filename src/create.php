<?php

session_start();

if(
    isset($_POST["statut_recherche"]) && !empty($_POST["statut_recherche"])
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

    $sql = "INSERT INTO users (statut_recherche, nom_entreprise, date_postuler, date_relance, type_postulation, methode_postulation, intitule_poste, type_contrat, mail_contact, commentaires) 
    VALUES (:statut_recherche, :nom_entreprise, :date_postuler, :date_relance, :type_postulation, :methode_postulation, :intitule_poste, :type_contrat, :mail_contact, :commentaires)";

    $query = $db->prepare($sql);
    $query->bindValue(":statut_recherche", $statut_recherche);
    $query->bindValue(":nom_entreprise", $nom_entreprise);
    $query->bindValue(":date_postuler", $date_postuler);
    $query->bindValue(":date_relance", $date_relance);
    $query->bindValue(":type_postulation", $type_postulation);
    $query->bindValue(":methode_postulation", $methode_postulation);
    $query->bindValue(":intitule_poste", $intitule_poste);
    $query->bindValue(":type_contrat", $type_contrat);
    $query->bindValue(":mail_contact", $mail_contact);
    $query->bindValue(":commentaires", $commentaires);

    $query->execute();

    $_SESSION["message"] = "Stage ajouté";
    header("Location: index.php");

} else {
    echo "Veuillez remplir le formulaire";
}

?>