<?php
function getConnexion(){
  $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque','root','');
  return $dbh;
}
function getAllLivres(){
  $db=getConnexion();
  $rep=$db->prepare("select * from livre");
  $rep->execute();
  $rep->setFetchMode(PDO::FETCH_OBJ);
  $tab=array();
  while($ligne=$rep->fetch()){
    $tab[]=$ligne;
}
return $tab;
}
function getAllCategories(){
  $db=getConnexion();
  $rep=$db->prepare("select * from categorie");
  $rep->execute();
  $rep->setFetchMode(PDO::FETCH_OBJ);
  $tab=array();
  while($ligne=$rep->fetch()){
    $tab[]=$ligne;
}
return $tab;
}

