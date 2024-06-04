<?php

session_start();

//Problème ici le logout revient sur le profil //

// if(isset($_SESSION["mdp"])){
//     header("Location: login.php");
//     exit;
// }

unset($_SESSION["mdp"]);

header("Location: index.php");

?>

