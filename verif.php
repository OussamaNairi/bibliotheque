<?php
session_start();
require_once("functions.php");

$pass=$_POST["pass"];

$db=getConnexion();
$req=$db->prepare("select * from user where emailuser=:login ");
$req->bindParam(":login",$_POST['email']);
$req->execute();
$req->setFetchMode(PDO::FETCH_ASSOC);
$exist=0;
if($req->rowCount()>0){
    while($d=$req->fetch()){
		if (password_verify($pass,$d["passworduser"])){
        $_SESSION["iduser"]=$d["iduser"];
		$_SESSION["user"]=$d["nameuser"]." ".$d["prenomuser"];
		$_SESSION["etat"]=$d["etatuser"];
		$existe=1;
		}
		
	}
}
if($existe==0){
     $_SESSION["erreur"]="votre login ou password invalid";
     $_SESSION["type_erreur"]="warning";
	header("location:connexion.php");
}
else{
    $date=date("d-m-Y h:m:s");
   $stmt=$db->prepare("update user set dateaccess=:date where iduser=:iduser");
    $stmt->bindParam(":date", $date);
    $stmt->bindParam(":iduser", $_SESSION["iduser"]);
    $stmt->execute();
	header("location:gestion.php");

}