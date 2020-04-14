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
function getByMotCle($id){
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
function getLivreByIdEmprunt($id_emprunt){
    $db=getConnexion();
    $req=$db->prepare("select id_livre from emprunt where id=?");
    $req->bindParam(1,$id_emprunt);
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}
function getMesEmprunts($id){
    $db=getConnexion();
    $req=$db->prepare("select* from emprunt where id_etd=:var1 and etat_emprunt=1");
    $req->bindParam(":var1",$_SESSION["iduser"]);
 
    $req->execute();
    $req->setFetchMode(PDO::FETCH_OBJ);
    $tab=array();
    while($ligne=$req->fetch())
    {
    $tab[]=$ligne;
    }
    return $tab;
}