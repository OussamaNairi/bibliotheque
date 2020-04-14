<?php
session_start();
unset($_SESSION["iduser"]);
unset($_SESSION["user"]);
$_SESSION["erreur"]="merci pour votre connexion";
$_SESSION["type_erreur"]="info";
header("location:connexion.php");
