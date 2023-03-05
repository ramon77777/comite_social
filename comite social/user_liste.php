<?php

  session_start();
  include('connexion_bd.php');
  
  	$terme = isset($_GET['terme'])?$_GET['terme']:"";

  	$size = isset($_GET['size'])?$_GET['size']:4;//le nombre de personnes par page
    $page = isset($_GET['page'])?$_GET['page']:1; //pour le numero de la page
    $offset = ($page-1)*$size;

	$requetecount = "select count(*) countS from admin where user like '%$terme%' ";
	$resultat = $conn->query($requetecount);
    $tabcount = $resultat->fetch();
    $nombre_adherent = $tabcount['countS'];

    $reste =  $nombre_adherent % $size ;
    if($reste===0){
        $nombre_page =  $nombre_adherent / $size;
    }else
        $nombre_page = floor( $nombre_adherent / $size) + 1;//floor() permet de recupérer la partie d'un nobre decimal



?>


<!doctype html>
<html lang="en">
  <head>
  	<title>liste_de_adherent-comite_social</title>
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
		                  <li style="position:relative;top: -10px;"><a href="inscription.php">Nouvel utilisateur</a></li>
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
		                   <li style="position:relative;top: -10px;"><a href="user_liste.php">Admin</a></li>
		                </ul>
		             </div>
		        </li>

		        <li><a href="liste.php" style="position:relative;top:15px;" class="c">Liste des adhérents</a></li>
		        <li><a href="deconnexion.php" style="position:relative;left: 100px;top:15px;" class="c">Deconnexion</a></li>
		      </ul>
   	 		</div>


			<div class="bd-cheatsheet container bg-body">				
			  <section id="content">
			    <article class="my-3" id="tables">
			      <div>
			        <div class="bd-example">
			        <table class="table table-sm table-bordered">
			          <thead>
			          <tr>
			            <th scope="col">Nom d'utilisateur</th>
			            <th scope="col">ACTIONS</th>
			          </tr>
			          </thead>
			          <tbody>


			          <?php
			          		$liste = $conn->query("SELECT *FROM admin");

			          			while($lister = $liste->fetch()) {
			          				$_SESSION["idcc"] = $lister["id"];
			          ?>   
			          					<tr>
								            <td><?php echo $lister["user"]?></td>
								             <td>
								             
								             	 <a href="inscription.php?id=<?php echo $_SESSION["idcc"] ?>" class="button" style="padding: 3px 5px;font-size: 14px;background-color: cyan;">NOUVEL UTILISATEUR</a>
								             	  <a href="supprimer_user.php?id=<?php echo $_SESSION["idcc"] ?>" class="button" style="padding: 3px 5px;font-size: 14px;background-color: lightcoral;">SUPPRIMER</a>
								             </td>
								          </tr>
								  <?php
			          			}
			          		$liste->closeCursor();
			           ?>
						</tbody>
						<tfoot>
							<th scope="col">Nom d'utilisateur</th>
			            	<th scope="col">ACTIONS</th>
                        </tfoot>
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
