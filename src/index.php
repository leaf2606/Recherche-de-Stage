<?php
session_start();

require_once("connect.php");

$sql = "SELECT * FROM users";

// On prépare la requête // 
$query = $db->prepare($sql);
// On execute la requête //
$query->execute();
// On récuper les donnés sous forme de tableau associatif //
$users = $query->fetchAll(PDO::FETCH_ASSOC);

function checkRelanceDate($date_relance) {
    $current_date = new DateTime();
    $relance_date = new DateTime($date_relance);
    $interval = $current_date->diff($relance_date);
    return $interval->days > 7 && $current_date > $relance_date;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Atelier-stage</title>
</head>
<body>

    <nav>
        <ul class="navigation">
                <li><a href="register.php">Inscription</a></li>
                <li><a href="index.php">Accueil</a></li>
            <?php if(!isset($_SESSION["mdp"])): ?>
                <li><a href="login.php">Connexion</a></li>
            <?php else: ?>
                <li><a href="logout.php">Deconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <h1>Recherche de stage</h1>

    <?php 
        if(!empty($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";
            $_SESSION["message"] = "";
        }
    ?>

    <table>
        <thead>
            <td>id</td> 
            <td>Statut de la Recherche</td>
            <td>Nom de l'entreprise</td>
            <td>Date de postulation</td>
            <td>Date de relance</td>
            <td>Type de postulation</td>
            <td>Métohde de postulation</td>
            <td>Intitulé du poste</td>
            <td>Type de contrat</td>
            <td>Adresse-mail de contact</td>
            <td>Commentaires</td>
        </thead>
    
    <tbody>
        <?php
            $counter = 1; 
            foreach($users as $user) {
                $isRelanceDue = checkRelanceDate($user["date_relance"]);
        ?>

            <tr <?php if($isRelanceDue) echo 'style="background-color: #F5DEB3;"'; ?>>
                <td><?= $counter++ ?></td>
                <td><?= $user["statut_recherche"]?></td>
                <td><?= $user["nom_entreprise"]?></td>
                <td><?= $user["date_postuler"]?></td>
                <td><?= $user["date_relance"]?></td>
                <td><?= $user["type_postulation"]?></td>
                <td><?= $user["methode_postulation"]?></td>
                <td><?= $user["intitule_poste"]?></td>
                <td><?= $user["type_contrat"]?></td>
                <td><?= $user["mail_contact"]?></td>
                <td><?= $user["commentaires"]?></td>  
                
                <td>   
                    <a href="user.php?id=<?= $user["id"] ?>">Voir</a>
                </td>                                             
            </tr>
        
        <?php
           }
        ?>
            <div class="ajoutez">
           <a href="form.php"><button>Ajoutez une entreprise</button></a>
           </div>
    </tbody>
    </table>
</body>
</html>