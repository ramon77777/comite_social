<?php


session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  $id = $_GET["id"];


  


   if ( isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["date"]) AND isset($_POST["montant"]) AND isset($_POST["titre"]) ) {
    $_SESSION["nom"]= $_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["montant"]= $_POST["montant"];
     $_SESSION["titre"]= $_POST["titre"];


    $req = $conn->prepare("UPDATE cotisation_mensuelle SET nom=?,prenom=?,date=?,montant=?, titre=? WHERE id=$id");
    $req->execute(array($_SESSION["nom"],$_SESSION["prenom"], $_SESSION["date"], $_SESSION["montant"],$_SESSION["titre"]));


    header("location:detail_mensuelle.php");

  }


  ?>