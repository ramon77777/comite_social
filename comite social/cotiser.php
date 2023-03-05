<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

 



 	 if ( isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["date"]) AND isset($_POST["cotisation_annuelle"]) ) {
    $_SESSION["nom"]= $_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["cotisation_annuelle"]= $_POST["cotisation_annuelle"];

    $req = $conn->prepare("INSERT INTO cotisationa(nom,prenom,date,cotisation_annuelle) VALUES (?,?,?,?)");
    $req->execute(array($_SESSION["nom"],$_SESSION["prenom"],  $_SESSION["date"], $_SESSION["cotisation_annuelle"]));


    header("location: detail_cotisation.php");

  }


  				
?>





<!doctype html>
<html lang="en">
  <head>
  	<title>Comite social</title>
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
					<h3 style="position:relative;top: 50px;"><strong>AJOUTER LA COTISATION</strong></h3>	 				      
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
			            <th scope="col">PRENOM</th>
			             <th scope="col">DATE</th>
			            <th scope="col">COTISATION ANNUELLE</th>
			          </tr>
			          </thead>
			          <tbody>
			         
								<tr>
			            <form method="POST" action="cotiser.php">

			            <?php


			             $id = $_GET["id"];
			             
									 $utiliser = $conn->query("SELECT * FROM adherent WHERE id= $id");
									 

			            while ($use = $utiliser->fetch()) {
			            ?>			            

			            <td>
			            	<input type="text" name="nom" class="montant" style="padding:7px; border-radius:8px; border:1px solid grey;padding: 4px;" value="<?php echo $use["nom_s"]; ?>">
			            </td>
			            <td>
			            	<input type="text" name="prenom" class="montant" style="padding:7px; border-radius:8px; border:1px solid grey;padding: 4px;" value="<?php echo $use["prenom_s"] ?>">
			            </td>
			            
			            <td> 		 
			            			<input type="date" name="date" class="montant" style="padding:7px; border-radius:8px; border:1px solid grey;padding: 4px;">	    	
			            </td>
			             <td> 		 
			                        
			            			 <input type="number" name="cotisation_annuelle" placeholder="cotisation annuelle" value="0" class="montant" style="padding:7px; border-radius:8px; border:1px solid grey;padding: 4px;">	       	
			            </td>
			             <td>
			             	 	 <input type="submit" name="ajouter" class="ajouter" value="ENVOYER" style="padding:4px 8px;background-color: lightgreen;">
			             </td>

			              <?php
			          	}
			          $utiliser->closeCursor();

			             	?>

			             </form>
			          </tr>

	
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
