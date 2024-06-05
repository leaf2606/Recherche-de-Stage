<?php

session_start();

// $_SESSION["user_id"] = null;

session_destroy();

$db = null;

header("Location: login.php");

?>