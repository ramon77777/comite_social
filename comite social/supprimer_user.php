<?php


session_start();
include('connexion_bd.php');

   $idd = $_GET["id"];

       $req = $conn->prepare("DELETE FROM admin WHERE id=$idd");
       $req->execute();

    header("location: user_liste.php");


  ?>