<?php
session_start();
include('../classes/connect.php');
$db = connect('../pharmacie.db');
if (isset($_GET['cancel'])) {
  $n = $_GET['numero'];
  $sql = $db->prepare("DELETE FROM tb_produit_vendu where numero = :n");
  $sql->bindValue(':n', $n);
  $sql->execute();
}
if (isset($_GET['item'])) {
  $items = $_GET['item'];
  $item = json_decode($items);
  $proID = array_column($item, 'codebare');
  $quant = array_column($item, 'quant');
  $nbr = (count($proID)) + 1;
  $a = 0;
  for ($i = 0; $i < $nbr; $i++) {
    // fetch the product
    $sql = $db->prepare("SELECT * FROM `tb_produtos` where codInterno= :code");
    $sql->bindValue(':code', $proID[$a]);
    $sql->execute();
    $pro = $sql->fetch();
    $reste = $pro['quantidade'];
    //update quant in the inventory
    $sql2 = $db->prepare("UPDATE tb_produtos SET quantidade = :quantidade WHERE codInterno = :code");
    $sql2->bindValue(':code', $proID[$a]);
    $sql2->bindValue(':quantidade', ($reste + $quant[$a]));
    $sql2->execute();
    //END update quant in the inventory
    ++$a;
  }
}
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
        <li class="active"><a href="#"><span class="c">C</span>AISSE</a></li>
        <li><a href="stock.php"><span class="c">S</span>TOCK</a></li>
        <li><a href="parametre.php"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>

    <div id="Block2" class="col-md-10">
      <!-- app content -->
      <div class="bar" align="center">
        <table>
          <td>
            <p class="text">DISPENSAIRE ANGLICAN TSINJOHASINA</p>
          </td>
          <td><a href="php/actual.php?reload=true" class="btn btn-danger loggout" style="position: absolute;right: 5%;top: 0%;color: #00a99d;border: 2px solid #00a99d;background-color: white;text-decoration: none;" onMouseOut="this.style='position: absolute;right: 5%;top: 0%;color: #00a99d;border: 2px solid #00a99d;background-color: white;text-decoration: none;'" onMouseOver="this.style='position: absolute;right: 5%;top: 0%;color: white;border: 2px solid #00a99d;background-color: #00a99d;text-decoration: none;'">Actualiser</a></td>
        </table>
      </div>

      <div class="title">
        <p class="titre" style="width: 200px;"><span class="caisse">📠</span>Caisse</p>
      </div>

      <div class="content">
        <div id="tab" class="col-md-4">
          <div style="margin-bottom: 39px;" id="Block21" class="col-md-5">
            <input type="text" id="type" placeholder="Catégorie..." disabled style="margin-top: 0%;">
            <input type="text" id="search" placeholder="Nom ou code du produit">
            <div id="match-list"></div>
            <div class="stock">
              <label class="ens" style="font-size: 20px; margin-right:20px">En stock: </label>
              <input type="text" id="codeinterne" name="code" placeholder="Stock" style="width: 75px;" disabled>
            </div>
            <input type="number" id="qty" name="qtt" placeholder="Quantité(s)" min="1" oninput="validity.valid||(value='');">
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
              <button type="submit" name="facturer" style="width: 140px;">📠 Encaisser</button>
              <a href="../sales.php" style="text-decoration:none; color:black;">🛒 Ventes</a>
              <a href="../main.php?pg=cliente" style="text-decoration:none; color:black;">➕ Clients</a>
            </div>

          </form>

          <?php if (isset($_GET['finaliser'])) {
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