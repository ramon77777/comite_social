<?php

  session_start();
  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

  if (isset($_POST["retour"])) {
          if ($_POST["retour"]=="RETOUR") {
            header("location:liste.php");
          }
        }  		

?>