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
  <style>
    .passview {
      border-radius: 10px;
      font-size: medium;
      width: 200px;
    }

    .passview-on {
      background-color: #00a99d;
      color: white;
    }
    /* ==============================
         CAISSE LOGGOUT BUTTON
    =============================== */
    .loggout{
      position: absolute;
      right: 5%;
      top: 0%;
      border: 2px solid #00a99d;
      background-color: white;
    }
    .loggout > a {
      color: #00a99d;
      text-decoration: none;
    }
    .loggout > a:hover {
      color: white;
      text-decoration: none;
    }
    /* ==============================
         TOGGLE SWITCH UI BUTTON
    =============================== */
    .toggle-1 {
      font-family: Arial, Helvetica, sans-serif;
      display: inline-block;
      vertical-align: top;
      margin: 15px;
    }

    .toggle-1__input {
      display: none;
    }

    .toggle-1__button {
      position: relative;
      display: inline-block;
      font-size: 1rem;
      line-height: 20px;
      text-transform: uppercase;
      background-color: #e6e6e6;
      border: solid 2px black;
      color: while;
      width: 65px;
      height: 32px;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .toggle-1__button::before {
      position: absolute;
      top: 4px;
      left: 30px;
      content: "off";
      height: 20px;
      padding: 0 3px;
      background: white;
      color: #00a99d;
      border: 0.5px solid #00a99d;
      transition: all 0.3s ease;
    }

    .toggle-1__input:checked+.toggle-1__button {
      background-color: #00a99d;
      border: solid 2px black;
    }

    .toggle-1__input:checked+.toggle-1__button::before {
      left: 5px;
      content: "on";
      color: #00a99d;
      width: 30px;
    }
  </style>
</head>

<body>
  <content>
    <div id="Block1" class="col-md-2">
      <img class="logo" src="img/logo.png">
      <ul class="menu">
        <li><a href="index.php"><span class="c">C</span>AISSE</a></li>
        <li><a href="stock.php?pg=stock"><span class="c">S</span>TOCK</a></li>
        <li class="active"><a href="#"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>
    <div id="Block2" class="col-md-10">
      <div class="bar" align="center">
        <table>
          <td>
            <p class="text">DISPENSAIRE ANGLICAN TSINJOHASINA</p>
          </td>
          <td><button class="btn btn-danger loggout"> <a href="../logout.php">Se déconnecter</a></button></td>
        </table>
      </div>
      <div class="title">
        <p class="titre" style="width: 200px; padding-left: 40px;"><span class="caisse">🔐</span>Admin</p>
      </div>
      <div class="error" align="center" style="margin-top: 60px;">
        <h4> <?php if (isset($_GET['err'])) {
                echo $_GET['err'];
              } else  echo 'Veuillez entrer votre compte!'; ?> </h4>
      </div>
      <div>
        <div class="Block21">
          <form action="php/parametre.php" method="POST" enctype="multipart/form-data">
            <div class="block" style="display:flex; flex-direction:column;">
              <input type="text" name="nom" placeholder="Utilisateur">
              <input type="password" class="passadmin" name="code" placeholder="Mot de passe">
              <div align="center">
                <table>
                  <td>
                    <label for="toggle1" class="toggle-1">
                      <input type="checkbox" name="loggout" id="toggle1" class="toggle-1__input">
                      <span class="toggle-1__button"></span>
                    </label>
                  </td>
                  <td>
                    <h5>Afficher le mot de passe.</h5>
                  </td>
                </table>

                <script>
                  var passview = document.querySelector(".toggle-1__input");
                  var passadmin = document.querySelector(".passadmin");
                  passview.addEventListener("click", function(e) {

                    if (passadmin.type == "password") {
                      passadmin.type = "text"
                    } else {
                      passadmin.type = "password"
                    }
                  });
                </script>
              </div>
            </div>
        </div>
      </div>
      <div class="bouton2" align="center" style="margin-left: 24px; margin-top:0;">
        <button type="submit" name="valider">Valider</button>
      </div>
    </div>
  </content>
  </form>
</body>

</html>