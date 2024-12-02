<?php

// On vérifie qu'il y a bien un id dans l'url et que l'utilisteur correspondant existe //

if(isset($_GET{"user_id"}) && !empty($_GET{"user_id"})) {

require_once("connect.php");

    // echo $_GET["id"];
$id = strip_tags($_GET["user_id"]);

$sql = "SELECT * FROM users WHERE user_id = :user_id";

$query = $db->prepare($sql); 
// On accroche la valeur id de la requête à celle de la variable $id //

$query->bindValue(":user_id", $user_id, PDO::PARAM_INT);

$query->execute();

$user = $query->fetch();

// On vérifie si l'utilisateur existe // 

if(!$user){
    header("Location: index.php");
} else {
    // On gère la suppresion de l'utilisateur //
    $sql = "DELETE FROM users WHERE user_id = :user_id";
    
    $query = $db->prepare($sql); 
    
    $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);

    $query->execute();
    header("Location: index.php");
}


// print_r($user);

} else{
    header("Location: index.php");
}

?>