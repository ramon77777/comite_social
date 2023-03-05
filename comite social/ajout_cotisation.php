<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

 
  		

  		

?>



<!doctype html>
<html lang="en">
  <head>
  	<title>cotisation-comite_social</title>
		<meta charset="utf-8" />
	    <meta name="description" content="">
	    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	    <meta name="generator" content="Hugo 0.88.1">
	    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cheatsheet/">

		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<link rel="stylesheet" href="menu.css" />

    	<!-- Bootstrap core CSS -->
		<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cheatsheet.css" rel="stylesheet">
  </head>
  <body class="bg-light">


<div class="menu-bar" style="height:110px; position: fixed;z-index:100;background-color: darkcyan;">
		      <h1 class="logo"><img src="logo.jpeg" alt="logo" style="position:relative;top: 18px;border-radius: 20px;height: 90px;"></h1>
		      <ul style="position:relative;left: -30px;">
		        <li><a href="accueil.php" style="font-size: 28px;color: white; position: relative;top: 16px;border-bottom-color:white;">ACCUEIL</a></li>
		        <li>
		        	<a href="#" style="position:relative;top:15px;" class="c">Adherent</a>
		            <div class="dropdown-menu">
		                <ul style="position:relative;top: -5px;left: -8px;">
		                  <li><a href="adherer.php">Inscription</a></li>
		                  <li style="position:relative;top: -10px;"><a href="cotisation.php">Payer</a></li>
		                </ul>
		             </div>
		        </li>
		        <li><a href="mensuelle.php" style="position:relative;top:15px;" class="c">Cotisation</a></li>
		        <li>
		        	<a href="#" style="position:relative;top:15px;" class="c">Detail Cotisation</a>
		            <div class="dropdown-menu">
		                <ul style="position:relative;top: -5px;left: -8px;">
		                  <li><a href="detail_cotisation.php">Annuelle</a></li>
		                  <li style="position:relative;top: -10px;"><a href="detail_droit.php">Adhesion</a></li>
		                   <li style="position:relative;top: -10px;"><a href="detail_mensuelle.php">Mensuelle</a></li>
		                </ul>
		             </div>
		        </li>

		        <li><a href="liste.php" style="position:relative;top:15px;" class="c">Liste d'adherent</a></li>
		        <li><a href="deconnexion.php" style="position:relative;left: 100px;top:15px;" class="c">Deconnexion</a></li>
		      </ul>
   	 		</div>

			<section id="header">
				<div class="inner">
					<h3 style="position:relative;top: 50px;"><strong>PAYER COTISATION</strong></h3>	 				      
					        <nav class="navbar navbar-expand-lg navbar-light bg-light">
					          <div class="container-fluid">
					            <div class="collapse navbar-collapse" id="navbarSupportedContent">
					              <form class="d-flex" style="position:relative;top:50px;" method="POST" action="cotisation.php">
					                <input class="form-control me-2" type="search" placeholder="Entrez le nom ou prenom d'adherent" aria-label="Search" style="padding:7px 5px;width: 400px; text-align: center;border-radius: 10px;" name="terme">
					                <input type="submit" name="rechercher" value="Rechercher">
					              </form>
					            </div>
					          </div>
					        </nav> 
				</div>
			</section>

			<div class="bd-cheatsheet container bg-body">				
			  <section id="content">
			    <article class="my-3" id="tables">
			      <div>
			        <div class="bd-example">
			        <table class="table table-sm table-bordered">
			          <thead>
			          <tr>
			            <th scope="col">NOM</th>
			            <th scope="col">PRENOMS</th>
			          </tr>
			          </thead>
			          <tbody>

			          <?php

			  
			 	if (isset($_POST["terme"])) {
  			$terme = $_POST["terme"]; 			
			  $termes = $conn->prepare("SELECT * from adherent where nom_s LIKE ? OR prenom_s LIKE ?")
			  ;			  
			  $termes->execute(array("%".$terme."%", "%".$terme."%"));

				while ($recherche = $termes->fetch()) {
					$_SESSION["idc"] = $recherche["id"];
		

			          ?>


			          <tr>
			            <td> <?php echo $recherche["nom_s"]; ?></td>
			            <td> <?php echo $recherche["prenom_s"]; ?></td>
			             <td>
			             	 <a href="cotiser.php?id=<?php echo $_SESSION["idc"] ?>" class="button" style="padding: 3px 5px;font-size: 14px;background-color: lightgreen;">AJOUTER COTISATION ANNUELLE</a>
			             	 <a href="cotiser1.php?id=<?php echo $_SESSION["idc"] ?>" class="button" style="padding: 3px 5px;font-size: 14px;background-color: lightgreen;">AJOUTER DROIT D'INSCRIPTION</a>
			             </td>
			          </tr>

			          

			          <?php
			          }
			          $termes->closeCursor();
			       
  		}
  		elseif (isset($_POST["terme"])=="") {
  		 	echo "aucun resultat";
  		 } 
			         
	

  			
  				
  		
			          ?>

			          </tbody>
			        </table>
			        </div>
			      </div>
			    </article>
			  </section> 
			<div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="cheatsheet.js"></script>

    <!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>

  </body>
</html>
