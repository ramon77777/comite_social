<?php


session_start();

include('connexion_bd.php');

   $idd = $_GET["id"];

       $req = $conn->prepare("DELETE FROM cotisationa WHERE id=$idd");
       $req->execute();

    header("location: detail_cotisation.php");


  ?>