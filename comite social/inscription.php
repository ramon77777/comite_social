<?php
  session_start();

  try {
    $conn = new PDO("mysql:host=localhost;dbname=comite_social","root","");
  }
    catch (Exception $e) {
    die("erreur :".$e->getMessage());
  }


  if ( isset($_POST["user"]) AND isset($_POST["mot_de_passe"]) AND isset($_POST["confirme"]) ) {
    $_SESSION["user"]= $_POST["user"];
    $_SESSION["mot_de_passe"]=$_POST["mot_de_passe"];
    $_SESSION["confirme"]=$_POST["confirme"];

    if ($_SESSION["mot_de_passe"] == $_SESSION["confirme"]) {
      $req = $conn->prepare("INSERT INTO Admin(user,mot_de_passe) VALUES (?,?)");
      $req->execute(array($_SESSION["user"],$_SESSION["mot_de_passe"]));
      header("location: index.php");
    }

    else {
      header("location:admin_echec");
    }

  }

  
?>



<html>
<head>
  <meta charset="utf-8">
  <title>Admin-inscription-comite_social</title>
  <link rel="stylesheet" type="text/css" href="conn.css">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="http://blog.stackfindover.com/" rel="dofollow">FORMULAIRE D'INSCRIPTION</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Vous n'avez pas de compte ? créez✔</span>
              <form id="stripe-login" action="inscription.php" method="POST">
                <div class="field padding-bottom--24">
                  <label for="email">User</label>
                  <input type="text" name="user">
                </div>
                <div class="field padding-bottom--24">
                  <label for="password">Mot de passe</label>
                  <input type="password" name="mot_de_passe">
                </div>
                 <div class="field padding-bottom--24">
                  <label for="password">Confirmer mot de passe</label>
                  <input type="password" name="confirme">
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="inscription" value="INSCRIPTION">
                </div>
                <div class="field">
                  <a class="ssolink" href="index.php">Ou connectez-vous</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>