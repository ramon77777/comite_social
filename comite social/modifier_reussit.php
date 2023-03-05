<?php


session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }

   $idd = $_SESSION["a"];


   if ( isset($_POST["nom_s"]) AND isset($_POST["prenom_s"]) AND isset($_POST["contact_s"]) AND isset($_POST["residence_s"]) AND isset($_POST["numero_b"]) AND isset($_POST["nom_b"]) AND isset($_POST["prenom_b"]) AND isset($_POST["lieu_naissance_b"]) AND isset($_POST["date_naissance_b"]) AND isset($_POST["lieu_residence_b"]) AND isset($_POST["date_inscription_b"]) AND isset($_POST["date_charge_b"]) ) {
    $_SESSION["nom_s"]= $_POST["nom_s"];
    $_SESSION["prenom_s"]=$_POST["prenom_s"];
    $_SESSION["contact_s"]=$_POST["contact_s"];
    $_SESSION["residence_s"]= $_POST["residence_s"];

     $_SESSION["numero_b"]= $_POST["numero_b"];
      $_SESSION["nom_b"]= $_POST["nom_b"];
       $_SESSION["prenom_b"]= $_POST["prenom_b"];
        $_SESSION["lieu_naissance_b"]= $_POST["lieu_naissance_b"];

         $_SESSION["date_naissance_b"]= $_POST["date_naissance_b"];
          $_SESSION["lieu_residence_b"]= $_POST["lieu_residence_b"];
          
             $_SESSION["date_inscription_b"]= $_POST["date_inscription_b"];
              $_SESSION["date_charge_b"]= $_POST["date_charge_b"];


               $_SESSION["personne1"]= $_POST["personne1"];
              $_SESSION["personne2"]= $_POST["personne2"];
              $_SESSION["personne3"]=$_POST["personne3"];

              $_SESSION["c1"]= $_POST["c1"];
              $_SESSION["c2"]= $_POST["c2"];
              $_SESSION["c3"]=$_POST["c3"];


    $req = $conn->prepare("UPDATE Adherent SET nom_s=?,prenom_s=?,contact_s=?,residence_s=?,numero_b=?,nom_b=?,prenom_b=?,lieu_naissance_b=?,date_naissance_b=?,lieu_residence_b=?,date_inscription_b=?,date_charge_b=?,personne1=?,personne2=?,personne3=?,c1=?,c2=?,c3=? WHERE id=$idd");
    $req->execute(array($_SESSION["nom_s"],$_SESSION["prenom_s"],  $_SESSION["contact_s"], $_SESSION["residence_s"],$_SESSION["numero_b"],  $_SESSION["nom_b"], $_SESSION["prenom_b"] ,$_SESSION["lieu_naissance_b"],$_SESSION["date_naissance_b"],  $_SESSION["lieu_residence_b"], $_SESSION["date_inscription_b"], $_SESSION["date_charge_b"],$_SESSION["personne1"],$_SESSION["personne2"],$_SESSION["personne3"],$_SESSION["c1"],$_SESSION["c2"],$_SESSION["c3"]));


    header("location: liste.php");

  }


  ?>