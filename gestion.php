
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
            <a class="navbar-brand" href="#">Bilbio-ESSAT </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Home</a></li>

            </ul>
			<form class="navbar-form navbar-left" method="get" action="" >
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
                <a href="#" class="list-group-item active"> Categorie </a>
                <?php
   require_once("functions.php");
   $categories=getAllCategories();
   foreach($categories as $cat){
    ?>
					<a href='gestion.php?id=<?=$cat->id ?>' class="list-group-item"><?=$cat->titre ?></a>    
<?php
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
   require_once("functions.php");
   $livres=getAllLivres();
   foreach($livres as $liv){
    ?>
    <tr> <td><img src="images/<?=$liv->id ?>.png" width="80%" ></td>
         <td><?=$liv->titre ?></td>
         <td><?=$liv->auteurs ?></td>
         <td><?=$liv->nbre_exemplaires ?></td>
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










