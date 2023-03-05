<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

 



 	 if ( isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["date"]) AND isset($_POST["cotisation_annuelle"]) AND isset($_POST["titre"]) ) {
    $_SESSION["nom"]= $_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["cotisation_annuelle"]= $_POST["cotisation_annuelle"];
     $_SESSION["titre"]= $_POST["titre"];

    $req = $conn->prepare("INSERT INTO cotisation_mensuelle(nom,prenom,date,montant,titre) VALUES (?,?,?,?,?)");
    $req->execute(array($_SESSION["nom"],$_SESSION["prenom"],  $_SESSION["date"], $_SESSION["cotisation_annuelle"], $_SESSION["titre"]));


    header("location: detail_mensuelle.php");

  }


  				
?>
