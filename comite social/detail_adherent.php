<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  	$id  = $_GET['id'];
  	


  	$affiche = $conn->query("SELECT * FROM adherent where id = $id");
  	$donnee = $affiche->fetch();

  		

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>detail_de_l'adherent-comite_social</title>
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
  <body class="bg-light" style="margin-bottom: 20px;">


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
					<h3 style="position:relative;top: 50px;"><strong>INFORMATION SUR L'ADHERENT</strong></h3>	 				      
				</div>
			</section>

			<div class="bd-cheatsheet container bg-body">				
			  <section id="content">
			    <article class="my-3" id="tables">
			      <div>
			        <div class="bd-example">
			        <table class="table table-sm table-bordered">
			          <thead>
			          	<h3 style="position:relative;top: 20px;text-align: center;"><strong>SOUSCRIPTEUR</strong></h3>	
			          <tr>
			            <th scope="col">NOM</th>
			            <th scope="col">PRENOMS</th>
			            <th scope="col">CONCTACT</th>
			            <th scope="col">RESIDENCE</th>
			          </tr>
			          </thead>
			          <tbody>
			          <tr>
			            <td style="font-weight: bold;"><?php echo $donnee["nom_s"]; ?> </td>
			            <td style="font-weight: bold;"><?php echo $donnee["prenom_s"]; ?> </td>
			            <td style="font-weight: bold;"><?php echo $donnee["contact_s"]; ?> </td>
			            <td style="font-weight: bold;"><?php echo $donnee["residence_s"]; ?></td>
			          </tr>
			          </tbody>
			        </table>
			        <table class="table table-sm table-bordered">
			          <thead>
			          	<h3 style="position:relative;top: 20px;text-align: center;"><strong>BENEFICIAIRE</strong></h3>	
			          <tr>
			            <th scope="col">N° IIDENTIFICATION</th>
			            <th scope="col">NOM</th>
			            <th scope="col">PRENOMS</th>
			            <th scope="col">LIEU DE NAISSANCE</th>
			            <th scope="col">CONTACT</th>
			          </tr>
			          </thead>
			          <tbody>
			          <tr>
			            <td style="font-weight: bold;"><?php echo $donnee["numero_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["nom_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["prenom_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["lieu_naissance_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["contact1"]; ?></td>
			          </tr>
			          </tbody>
			          <thead>
			          <tr style="position: relative;top: 80px;">
			            <th scope="col">DATE DE NAISSANCE</th>
			            <th scope="col">LIEU DE RESIDENCE</th>
			            <th scope="col">DATE D'INSCRIPTION</th>
			            <th scope="col">DATE DE PRISE EN CHARGE</th>
			          </tr>
			          </thead>
			          <tbody>
			          <tr style="position: relative;top: 100px;">
			            <td style="font-weight: bold;"><?php echo $donnee["date_naissance_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["lieu_residence_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["date_inscription_b"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["date_charge_b"]; ?></td>
			          </tr>
			          </tbody>


			           <thead style="position: relative;top: 60px;">
			          <tr style="position: relative;top: 80px;">
			            <th scope="col">AYANT DROIT</th>
			            <th scope="col">CONTACT</th>
			          </tr>
			          </thead>
			          <tbody style="position: relative;top: 60px;">
			          <tr style="position: relative;top: 80px;">
			            <td style="font-weight: bold;"><?php echo $donnee["personne1"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["c1"]; ?></td>
			          </tr>
			          <tr style="position: relative;top: 80px;">
			            <td style="font-weight: bold;"><?php echo $donnee["personne2"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["c2"]; ?></td>
			          </tr>
			          <tr style="position: relative;top: 80px;">
			            <td style="font-weight: bold;"><?php echo $donnee["personne3"]; ?></td>
			            <td style="font-weight: bold;"><?php echo $donnee["c3"]; ?></td>
			          </tr>
			          </tbody>


			         

			        </table>
			        <a href="imprimer.php?id=<?php echo $donnee["id"] ?>" style="position:relative;top: 150px; background-color:cyan;color: white;" class="button">IMPRIMER</a>

			  
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
