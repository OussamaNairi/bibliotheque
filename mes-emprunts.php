<?php
   session_start();
require_once("functions.php");
if(!isset($_SESSION["user"])){
    header("location:connexion.php");

}
$categorie=null;
if(isset($_GET["id"])){
    $livre=getLivreByCat($_GET["id"]);
}elseif(isset($_GET["mot"])){
    $livre=Recherche($_GET["mot"]);

}
elseif(isset($_GET["emprunt"])){
    $emprunt=getMesEmprunts($_GET["emprunt"]);
    
}else{
    $livre= getAllLivres();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">          
            <a class="navbar-brand" href="#">Biblio-ESSAT </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="">Home</a></li>
                <li class="active"><a href="mes-emprunts.php?emprunt=<?=$_SESSION["iduser"]?>">Me emprunts</a></li>

            </ul>
			<form class="navbar-form navbar-left" method="get"  >
				<div class="form-group">
					<input type="text" name="mot" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Chercher</button>
			</form>

        </div>
    </div>
</nav>


<div class="container">
 
    <div class="row" style="margin-top: 80px;">
	
       <div class="col-md-3">
			<div class="row">
				<div class="list-group">
					<a href="gestion.php" class="list-group-item active">Categorie</a>
                    <?php
                    $categorie=getAllCategories();
                    foreach( $categorie as $value)

                     {
                        echo "<a href='gestion.php?id={$value->id}' class='list-group-item'>{$value->titre}</a>"; 
                     }       
                       ?>
                   
                     
				</div>
			</div>
			
			
        </div>
		
        <div class="col-md-9">

            <table class="table table-striped table-bordered">
                <thead>
                <tr><th style="width:90px">#</th><th>Titre</th><th>Auteurs</th><th>Exemplaires</th></tr>
                </thead>
                <tbody> 
                <?php
                    
                    foreach( $livre as $value)

                     {

                       ?>
                               
                    <tr>
                        <td> <img src="images/<?=$value->id ?>.png" width="80%" >    </td>
                        <td><?=$value->titre ?></td>
                        <td><?=$value->auteurs ?></td>
                        <td><?=$value->nbre_exemplaires ?></td>
                        <td><button class="btn btn-info">Emprunter</button></td>
                    </tr>
                    <?php
                     }
                     ?>                   
                </tbody>
            </table>


        </div>

    </div>

</div>


</body>
</html>
