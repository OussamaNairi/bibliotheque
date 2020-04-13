<?php
function getConnexion()
{
$dbh=new PDO('mysql:host=localhost;dbname=bibliotheque','root','');
return $dbh;
}
function getAllLivres(){
    $db=getConnexion();
    $req=$db->prepare("select * from livre");
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function getAllCategories(){
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

function getLivreByCat($id_cat){
    $db=getConnexion();
    $req=$db->prepare("select * from livre where id_cat=?");
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
	$req=$db->prepare("SELECT * FROM `livre` WHERE titre LIKE  ? ");
    $req->bindParam(1,$id);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}