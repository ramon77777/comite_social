<?php
  session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }


  if ( isset($_POST["nom_s"]) AND isset($_POST["prenom_s"]) AND isset($_POST["contact_s"]) AND isset($_POST["residence_s"]) AND isset($_POST["numero_b"]) AND isset($_POST["nom_b"]) AND isset($_POST["prenom_b"]) AND isset($_POST["lieu_naissance_b"]) AND isset($_POST["date_naissance_b"]) AND isset($_POST["lieu_residence_b"]) AND isset($_POST["date_inscription_b"]) AND isset($_POST["date_charge_b"]) AND isset($_POST["contact1"])) {
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
              $_SESSION["contact1"]=$_POST["contact1"];

               $_SESSION["personne1"]= $_POST["personne1"];
              $_SESSION["personne2"]= $_POST["personne2"];
              $_SESSION["personne3"]=$_POST["personne3"];

              $_SESSION["c1"]= $_POST["c1"];
              $_SESSION["c2"]= $_POST["c2"];
              $_SESSION["c3"]=$_POST["c3"];



    $req = $conn->prepare("INSERT INTO Adherent(nom_s,prenom_s,contact_s,residence_s,numero_b,nom_b,prenom_b,lieu_naissance_b,date_naissance_b,lieu_residence_b,date_inscription_b,date_charge_b,contact1,personne1,personne2,personne3,c1,c2,c3) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute(array($_SESSION["nom_s"],$_SESSION["prenom_s"],  $_SESSION["contact_s"], $_SESSION["residence_s"],$_SESSION["numero_b"],  $_SESSION["nom_b"], $_SESSION["prenom_b"] ,$_SESSION["lieu_naissance_b"],$_SESSION["date_naissance_b"],  $_SESSION["lieu_residence_b"], $_SESSION["date_inscription_b"], $_SESSION["date_charge_b"],$_SESSION["contact1"],$_SESSION["personne1"],$_SESSION["personne2"],$_SESSION["personne3"],$_SESSION["c1"],$_SESSION["c2"],$_SESSION["c3"]));


    header("location: liste.php");

  }

  
?>


<!doctype html>
<html lang="en">
  <head>
    <title>page_adherent_inscription-comite_social</title>
    <meta charset="utf-8" />
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.88.1">
      <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cheatsheet/">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <link rel="stylesheet" href="menu.css" />

      <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #validationServer01, #validationServer02 {
        margin-bottom: 10px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cheatsheet.css" rel="stylesheet">
  </head>
  <body class="bg-light">



      <div class="menu-bar" style="height:110px; position: fixed;z-index:100;background-color: darkcyan;">
          <h1 class="logo"><img src="logo.jpeg" alt="logo" style="position:relative;top: 18px;border-radius: 20px;height: 90px;"></h1>
          <ul style="position:relative;left: -30px;">
            <li><a href="accueil.php" style="font-size: 28px;color: white; position: relative;top: 16px;border-bottom-color:white;">ACCUEIL</a></li>
            <li>
              <a href="#" style="position:relative;top:15px;" class="c">Adherent</a>
                <div class="dropdown-menu">
                    <ul style="position:relative;top: -5px;left: -8px;">
                      <li><a href="adherer.php">Inscription</a></li>
                      <li style="position:relative;top: -10px;"><a href="cotisation.php">Payer</a></li>
                    </ul>
                 </div>
            </li>
            <li><a href="mensuelle.php" style="position:relative;top:15px;" class="c">Cotisation</a></li>
            <li>
              <a href="#" style="position:relative;top:15px;" class="c">Detail Cotisation</a>
                <div class="dropdown-menu">
                    <ul style="position:relative;top: -5px;left: -8px;">
                      <li><a href="detail_cotisation.php">Annuelle</a></li>
                      <li style="position:relative;top: -10px;"><a href="detail_droit.php">Adhesion</a></li>
                       <li style="position:relative;top: -10px;"><a href="detail_mensuelle.php">Mensuelle</a></li>
                    </ul>
                 </div>
            </li>

            <li><a href="liste.php" style="position:relative;top:15px;" class="c">Liste d'adherent</a></li>
            <li><a href="deconnexion.php" style="position:relative;left: 100px;top:15px;" class="c">Deconnexion</a></li>
          </ul>
        </div>



        <section id="header">
        <div class="inner">
          <h3 style="position:relative;top: 50px;"><strong>REALISER UNE ADHESION</strong></h3>                
        </div>
      </section>

      <div class="inner">
          <h3 style="position:relative;top: 50px; text-align: center;justify-content: center;"><strong>SOUSCRIPTEUR</strong></h3>                
      </div>

      <article class="container" class="my-3" id="floating-labels" style="position:relative;top:50px; left: 25px;">
          <div>
            <div class="bd-example">
             <form class="row g-3" method="POST" action="adherer.php">
                  <div class="col-md-4">
                    <label for="validationServer01" class="form-label" style="position:relative;top:15px;text-align: center;">Nom</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" style="width:250px;" required name="nom_s">
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer02" class="form-label" style="position:relative;top:15px;text-align: center;">Prenoms</label>
                    <input type="text" class="form-control is-valid" id="validationServer02" style="width:250px;" required name="prenom_s"> 
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer02" class="form-label" style="position:relative;top:15px;text-align: center;text-align: center;">Contact</label>
                    <input type="tel" class="form-control is-valid" id="validationServer02" style="width:250px;height: 51px; border: 1px solid grey; border-radius: 4px;background: #90909013;" required name="contact_s" pattern="[0-9]{10}" maxlength="10"> 
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer02" class="form-label" style="position:relative;top:15px;text-align: center;">Résidence</label>
                    <input type="text" class="form-control is-valid" id="validationServer02" style="width:250px;"  required name="residence_s"> 
                  </div>


                 <div class="inner">
                      <h3 style="position:relative;text-align: center;top:45px;left: 260%;"><strong>BENEFICIAIRE</strong></h3>
                  </div>

                  <div class="container" style="position:relative;top: 90px;width: 40%;left: -210px;">
                      <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Numero d'identification" id="validationServer01"required name="numero_b">
                      </div>
                      <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Nom" id="validationServer02"  required name="nom_b"> 
                      </div>
                      <div class="col-md-4">
                        
                        <input type="text" class="form-control is-valid" placeholder="Prenoms" id="validationServer02"  required name="prenom_b"> 
                      </div>
                      <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Lieu de naissance" id="validationServer02"  required name="lieu_naissance_b"> 
                      </div>   
                      <div class="col-md-4">
                        <label for="validationServer02" class="form-label" style="position:relative;top:15px;text-align: center;">Date de naissance</label>
                        <input type="date" class="form-control is-valid" id="validationServer02" style="padding:7px 5px;position: relative;top: 2px;border-radius: 4px;border: 1px solid grey;background: #90909013;width: 100%;text-align: center;" required name="date_naissance_b"> 
                      </div>
                      
                  </div>


                   <div class="container" style="position:relative;top: 90px;width: 40%;">
                      <div class="col-md-4">
                        
                        <input type="text" class="form-control is-valid" placeholder="Lieu de residence" id="validationServer01" style="text-align: center;" required name="lieu_residence_b">
                      </div>


                      <div class="col-md-4">
                     
                      <input type="tel" class="form-control is-valid" id="validationServer02" style="width:425px;height: 51px; border: 1px solid grey; border-radius: 4px;background: #90909013; text-align: center;" required name="contact1" pattern="[0-9]{10}" maxlength="10" placeholder="Contact beneficiaire"> 
                      </div> 
                     
                      <div class="col-md-4">
                        <label for="validationServer02" class="form-label" style="position:relative;text-align: center;">Date d'inscription</label>
                        <input type="date" class="form-control is-valid" id="validationServer02" style="padding:7px 5px;position: relative;top: -21px;border-radius: 4px;border: 1px solid grey;background: #90909013;width: 100%;text-align: center;" required name="date_inscription_b"> 
                      </div>

                      <div class="col-md-4">
                        <label for="validationServer02" class="form-label" style="position:relative;top:-18px;text-align: center;">Date de prise en charge</label>
                        <input type="date" class="form-control is-valid" id="validationServer02" style="padding:7px 5px;position: relative;top: -34px;border-radius: 4px;border: 1px solid grey;background: #90909013;width: 100%;text-align: center;" required name="date_charge_b"> 
                      </div>       
                  </div> <br/>



                   <div class="inner" style="position:relative;top:130px;left:300px;">
                      <h3><strong>AYANTS-DROIT DESIGNES PAR ORDRE DE PRIORITE</strong></h3>
                  </div>

                  <div class="container" style="position:relative;top:120px;">
                  
                      <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Nom et prenoms de la premiere personne" id="validationServer02"   name="personne1" > 
                        <input type="tel" class="form-control is-valid" id="validationServer02" style="width:250px;height: 51px; border: 1px solid grey; border-radius: 4px;background: #90909013;text-align: center;"  name="c1" pattern="[0-9]{10}" maxlength="10" placeholder="Numero ayant droit 1"> 

                      </div>
                       <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Nom et prenoms de la deuxieme personne" id="validationServer02"   name="personne2"> 
                        <input type="tel" class="form-control is-valid" id="validationServer02" style="width:250px;height: 51px; border: 1px solid grey; border-radius: 4px;background: #90909013;text-align: center;"  name="c2" pattern="[0-9]{10}" maxlength="10" placeholder="Numero ayant droit 2"> 
                      </div>
                       <div class="col-md-4">
                       
                        <input type="text" class="form-control is-valid" placeholder="Nom et prenoms de la troisieme personne" id="validationServer02"   name="personne3"> 
                        <input type="tel" class="form-control is-valid" id="validationServer02" style="width:250px;height: 51px; border: 1px solid grey; border-radius: 4px;background: #90909013;text-align: center;" name="c3" pattern="[0-9]{10}" maxlength="10" placeholder="Numero ayant droit 3"> 
                      </div>
                      
                  </div>
                  <div style="position:relative;top:130px;margin-bottom: 200px;left: 476px;">
                      <input type="submit" value="ENVOYER" class="envoyer" name="envoyer" style="background-color: lightgreen;"> 
                  </div>  




            </form>
            </div>
          </div>
    </article>


      
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="cheatsheet.js"></script>

    <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.scrolly.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <script src="assets/js/main.js"></script>

  </body>
</html>
