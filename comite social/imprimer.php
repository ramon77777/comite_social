<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  	$id  = $_GET['id'];
  
  	


  	$affiche = $conn->query("SELECT * FROM adherent where id=$id ");
  	$donnee = $affiche->fetch();

  		

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>impression</title>
	<link rel="stylesheet" type="text/css" href="imprimer.css">
</head>
<body>



	<div class="tete">
		<div class="a">
			<h3>COMITE SOCIAL</h3>
			<img src="logo.jpeg" class="image"><br/>
			<h3 class="comite">CO.S.EE.AD.AC</h3>
			<p class="tete_text1">Ensemble Sauvons l'Eglise</p>
		</div>
		<div>
			<h2  class="b">FORMULAIRE D'ADHESION</h2>
		</div>
		<div class="c">
			<p><span>Comite social de l'Eglise Evengelique des</span><br/><span> Assemblées de Dieu Adzopé Centre</span> <br/><span> CO.S.EE.AD.AC</span> <br/><span>La multitude de ceux qui avaient cru </span><br/> <span>n'était qu'un coeur et qu'une âme</span> <br/><span>Actes 4v12</span></p>
		</div>

	</div>
	<div class="souscripteur">
		<h2 class="sou">SOUSCRIPTEUR</h2>
		<p>Nom : <span style="font-weight:bold;"><?php echo strtoupper($donnee["nom_s"]); ?></span> </p><br/>
		<p>Prenom : <span style="font-weight:bold;"><?php echo strtoupper($donnee["prenom_s"]); ?></span> </p><br/>
		<p>Contact : <span style="font-weight:bold;"><?php echo strtoupper($donnee["contact_s"]); ?></span> </p><br/>
		<p>Residence :  <span style="font-weight:bold;"><?php echo strtoupper($donnee["residence_s"]); ?></span></p><br/>
	</div>
	<div class="beneficiaire">
		<table class="tableau1">
			<tr>
				<td colspan="2" class="t1">BENEFICIAIRE</td>
			</tr>
			<tr>
				<td class="t2">Numero d'identification</td>
				<td><span style="font-weight:bold;"><?php echo strtoupper($donnee["numero_b"]); ?></span></td>
			</tr>
			<tr>
				<td class="t2">Nom et prenoms</td>
				<td><span style="font-weight:bold;"><?php echo strtoupper($donnee["nom_b"])." ".strtoupper($donnee["prenom_b"]); ?></span></td>
			</tr>
			<tr>
				<td class="t2">Date et lieu de naissance</td>
				<td><span style="font-weight:bold;"><?php echo strtoupper($donnee["date_naissance_b"])." à ".strtoupper($donnee["lieu_naissance_b"]); ?></span></td>
			</tr>
			<tr>
				<td class="t2">Lieu de residence</td>
				<td><span style="font-weight:bold;"><?php echo strtoupper($donnee["lieu_residence_b"]); ?></span></td>
			</tr>
			<tr>
				<td class="t2">Date d'inscription</td>
				<td><span style="font-weight:bold;"><?php echo $donnee["date_inscription_b"]; ?></span></td>
			</tr>
			<tr>
				<td class="t2">Date de prise en charge</td>
				<td><span style="font-weight:bold;"><?php echo $donnee["date_charge_b"];?></span></td>
			</tr>
		</table>
		<table class="tableau2">
			<tr>
				<td>Ayant droit</td>
				<td>Contact</td>
			</tr>
			<tr>
				<td style="font-weight:bold;">1- <?php echo strtoupper($donnee["personne1"]); ?></td>
				<td style="font-weight:bold;"><?php echo strtoupper($donnee["c1"]); ?></td>
			</tr>
			<tr>
				<td style="font-weight:bold;">2- <?php echo strtoupper($donnee["personne2"]); ?></td>
				<td style="font-weight:bold;"><?php echo strtoupper($donnee["c2"]); ?></td>
			</tr>
			<tr>
				<td style="font-weight:bold;">3- <?php echo strtoupper($donnee["personne3"]); ?></td>
				<td style="font-weight:bold;"><?php echo strtoupper($donnee["c3"]); ?></td>
			</tr>
		</table>
		
	</div>
	<div class="bas">
		<div class="bas1">
			<p>Fait à Adzopé le ........................</p>
			<p>Délégué (e) du COSEEADRA .....................</p>
		</div>
		<div class="bas2">
			<p style="position: relative;left: -10px;"><span>SIGNATURE DU SOUSCRIPTEUR</span><br/><span>Précédé des noms et prenoms</span></p>
			<p style="position:relative;left: -64px;">SIGNATURE DU PRESIDENT</p>
		</div>
	</div>

	<form class="formulaire" method="POST" action="retour.php">
		<input type="button" name="imprime" value="IMPRIMER" onclick="JavaScript:print();" style="background-color:cyan;padding: 12px 19px;border-radius: 10px; position: relative;left: 520px;top: -80px;">
		<input type="submit" name="retour" value="RETOUR" style="background-color:cyan;padding: 12px 19px;border-radius: 10px; position: relative;left: 520px;top: -80px;">

	</form>


</body>
</html>