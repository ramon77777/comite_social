<?php


session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  $id = $_GET["id"];


  


   if ( isset($_POST["nom"]) AND isset($_POST["prenom"]) AND isset($_POST["date"]) AND                         isset($_POST["droit_inscription"]) ) {
    $_SESSION["nom"]= $_POST["nom"];
    $_SESSION["prenom"]=$_POST["prenom"];
    $_SESSION["date"]=$_POST["date"];
    $_SESSION["droit_inscription"]= $_POST["droit_inscription"];


    $req = $conn->prepare("UPDATE droit_inscription SET nom=?,prenom=?,date=?,droit_inscription=? WHERE id=$id");
    $req->execute(array($_SESSION["nom"],$_SESSION["prenom"], $_SESSION["date"], $_SESSION["droit_inscription"]));


    header("location:detail_droit.php");

  }


  ?>