<?php
function getConnexion()
{
$dbh=new PDO('mysql:host=localhost;dbname=bibliotheque','root','');
return $dbh;
}
function getAllCategorie(){
$db=getConnexion();
$req=$db->prepare("select * from categorie");
$req->execute();
$req->setFetchMode(PDO::FETCH_OBJ);
$tab=array();
while($ligne=$req->fetch())
{
$tab[]=$ligne;
}
return $tab;

}
function getAllLivre(){
    $db=getConnexion();
    $req=$db->prepare("select* from livre");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function getLivreById($id_cat){
    $db=getConnexion();
    $req=$db->prepare("select* from livre where id_cat=?");
    $req->bindParam(1,$id_cat);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function Recherche($id){
    $db=getConnexion();
	$req=$db->prepare("SELECT * FROM `livre` WHERE  nbre_exemplaires LIKE  ? or titre LIKE  ? or auteurs  LIKE  ? ");
    $req->bindParam(1,$id);
    $req->bindParam(2,$id);
    $req->bindParam(3,$id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}