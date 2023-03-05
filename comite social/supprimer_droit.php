<?php


session_start();
include('connexion_bd.php');

   $idd = $_GET["id"];

       $req = $conn->prepare("DELETE FROM droit_inscription WHERE id=$idd");
       $req->execute();

    header("location: detail_droit.php");


  ?>