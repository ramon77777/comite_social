<?php


session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

   $idd = $_GET["id"];

       $req = $conn->prepare("DELETE FROM adherent WHERE id=$idd");
       $req->execute();

    header("location: liste.php");


  ?>