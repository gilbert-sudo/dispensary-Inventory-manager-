<?php
include('../classes/Sistema.php');

function createRandomPassword()
{
  $chars = "003232303232023232023456789";
  srand((float)microtime() * 1000000);
  $i = 0;
  $pass = '';
  while ($i <= 7) {

    $num = rand() % 33;

    $tmp = substr($chars, $num, 1);

    $pass = $pass . $tmp;

    $i++;
  }
  return $pass;
}

$finalcode = createRandomPassword();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <title>Logiciel vente</title>
</head>

<body>
  <content>
    <div id="Block1" class="col-md-2">
      <img class="logo" src="img/logo.png">
      <ul class="menu">
        <li <?php if (isset($_GET['pg'])) {
              if ($_GET['pg'] == "index") {
                print 'class="active"';
              }
            } ?>><a href="#"><span class="c">C</span>AISSE</a></li>
        <li <?php if (isset($_GET['pg'])) {
              if ($_GET['pg'] == "stock") {
                print 'class="active"';
              }
            } ?>><a href="stock.php?pg=stock"><span class="c">S</span>TOCK</a></li>
        <li <?php if (isset($_GET['pg'])) {
              if ($_GET['pg'] == "parametre") {
                print 'class="active"';
              }
            } ?>><a href="parametre.php?pg=parametre"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>

    <div id="Block2" class="col-md-10">
      <!-- app content -->
      <div class="bar" style="border-top:0.5px solid black;">
        <p class="text">DISPANSAIRE ANGLICAN</p>
        <!-- Dropdown menu -->
        <!-- <div class="dropdown">
          <div class="dropdown__hover">
              <img src="uploads/users/<?php echo 'image'; ?>"  class="img-circle img-inline">
              <span><?php echo 'nameUser'; ?> <i class="caret"></i></span>
          </div>
          <div class="dropdown__menu">
            <a href="#">
              <i class="glyphicon glyphicon-user"></i>
              Profile
            </a>
            <a href="#" title="edit account">
              <i class="glyphicon glyphicon-cog"></i>
              Settings
            </a>
            <a href="#">
              <i class="glyphicon glyphicon-off"></i>
              Logout
            </a>
          </div>
        </div> -->
        <!-- Dropdown menu -->
      </div>

      <div class="title">
        <p class="titre"><span class="caisse">C</span>AISSE</p>
      </div>

      <div class="content">
        <div id="tab" class="col-md-4">
          <div style="margin-bottom: 39px;" id="Block21" class="col-md-5">
            <select name="medecin" id="type">
              <option value="Medicament">Medicament</option>
              <option value="A">Autres</option>
            </select>
            <input type="text" id="search" placeholder="Nom ou code du produit">
            <div id="match-list"></div>
            <div class="stock">
              <label class="ens" style="font-size: 20px; margin-right:20px">En stock: </label>
              <input type="text" id="codeinterne" name="code" placeholder="Stock" style="width: 75px;" disabled>
            </div>
            <input type="number" id="qty" name="qtt" placeholder="Quantité(s)">
          </div>
          <div class="other">
            <ul class="colonne4">
              <li><a>code</a></li>
              <li><a>type</a></li>
              <li><a>nom</a></li>
              <li><a>P.U</a></li>
              <li><a>QTT</a></li>
              <li><a>total</a></li>
            </ul>
            <ul class="colonne5">
              <li><input type="text" id="codeinterne2" placeholder="aucun" disabled></li>
              <li><input type="text" id="type2" placeholder="aucun" disabled></li>
              <li><input type="text" id="search2" placeholder="aucun" disabled></li>
              <li><input type="text" id="prixunit" placeholder="0 Ar" disabled></li>
              <li><input type="text" id="qty2" placeholder="00" disabled></li>
              <li><input type="text" id="totalprix" placeholder="0 Ar" disabled></li>
            </ul>
          </div>
          <div class="bouton1">
            <button onclick="resetcart();">Vider</button>
            <button onclick="resetinput();">Effacer</button>
            <button onclick="ajouter();totalprixnet();">Ajouter >> </button>
          </div>
        </div>

        <div id="tab2" class="col-md-8">
          <!-- debut affichage panier -->
          <form action="../finir.php" method="post" class="formulaire">
            <div id="Block22">
              <ul class="colonne3">
                <li><a>nom</a></li>
                <li><a>P.U</a></li>
                <li><a>QTT</a></li>
                <li><a>total</a></li>
              </ul>
              <!-- pannier -->
              <div id="div2" style="border-right:0.5px solid black; border-left:0.5px solid black; overflow-y: scroll; max-height: 195px;"></div>
              <!-- end pannier -->
              <ul class="colonne3" style="border-top: 1px solid black;">
                <li><a></a></li>
                <li><a><strong> NET à payer:</strong></a></li>
                <li><input type="text" id="prixnet" name="total" placeholder="00" disabled><span style="font-size: 20px;">Ar</span></li>
              </ul>
            </div>
            <div class="bouton2">
              <button type="submit" name="facturer">Encaisser</button>
              <button onclick="return false;">Annuler</button>
            </div>
          </form>
          <?php if (isset($_POST['finaliser']) & !empty($_POST['cliente'])) {
            include('cupon-fiscal.php');
          } ?>
        </div>
      </div>
      <!-- fin affichage panier -->

      <!-- fin app content -->
    </div>
  </content>

  <script src="../js/caisse.js"></script>

</body>

</html>