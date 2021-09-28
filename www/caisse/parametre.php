<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/prm.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <title>Logiciel vente</title>
</head>

<body>
  <form action="php/parametre.php" method="POST" enctype="multipart/form-data">
    <content>
      <div id="Block1" class="col-md-2">
        <img class="logo" src="img/logo.png">
        <ul class="menu">
          <li <?php if (isset($_GET['pg'])) {
                if ($_GET['pg'] == "index") {
                  print 'class="active"';
                }
              } ?>><a href="index.php?pg=index"><span class="c">C</span>AISSE</a></li>
          <li <?php if (isset($_GET['pg'])) {
                if ($_GET['pg'] == "stock") {
                  print 'class="active"';
                }
              } ?>><a href="stock.php?pg=stock"><span class="c">S</span>TOCK</a></li>
          <li <?php if (isset($_GET['pg'])) {
                if ($_GET['pg'] == "parametre") {
                  print 'class="active"';
                }
              } ?>><a href="#"><span class="c">P</span>ARAMETRE</a></li>
        </ul>
      </div>
      <div id="Block2" class="col-md-10">
        <div class="bar">
          <p class="text">DISPANSAIRE ANGLICAN</p>
        </div>
        <div class="title">
          <p class="titre"><span class="caisse">P</span>ARAMETRE</p>
        </div>
        <div class="error" align="center" style="margin-top: 60px;">
          <h4> <?php if (isset($_GET['err'])) {
                  echo $_GET['err'];
                } else  echo 'Veuillez entrer votre compte!'; ?> </h4>
        </div>
        <div>
          <div class="Block21">
            <div class="block" style="display:flex; flex-direction:column;">
              <input type="text" name="nom" placeholder="Utilisateur">
              <input type="password" class="passadmin" name="code" placeholder="Mot de passe">
              <input type="button" style="margin: top 30px; cursor: default; border:1px solid black; padding:3px;" class="passview" value="👁‍🗨 Afficher le mots de passe">                <script>
                  var passview = document.querySelector(".passview");
                  var passadmin = document.querySelector(".passadmin");
                  passview.addEventListener("click", function(e) {
                    e.preventDefault();

                    if (passadmin.type == "password") {
                      passview.className = "fa fa-check-square-o passview"
                      passview.value = "👁‍🗨 Cacher le mots de passe"
                      passadmin.type = "text"
                    } else {
                      passview.className = "fa fa-square-o passview"
                      passview.value = "👁‍🗨 Afficher le mots de passe"
                      passadmin.type = "password"
                    }
                    return false;
                  });
                </script>
            </div>
          </div>
        </div>
        <div class="bouton2">
          <button type="submit" name="valider">Valider</button>
        </div>
      </div>
    </content>
  </form>
</body>

</html>