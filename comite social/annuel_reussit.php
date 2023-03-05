<?php


session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  $id = $_GET["id"];


  


   if ( isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["date"]) AND isset($_POST["cotisation_annuelle"]) ) {
    $_SESSION["nom"]= $_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["cotisation_annuelle"]= $_POST["cotisation_annuelle"];


    $req = $conn->prepare("UPDATE cotisationa SET nom=?,prenom=?,date=?,cotisation_annuelle=? WHERE id=$id");
    $req->execute(array($_SESSION["nom"],$_SESSION["prenom"], $_SESSION["date"], $_SESSION["cotisation_annuelle"]));


    header("location:detail_cotisation.php");

  }


  ?>