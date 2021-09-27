<?php
include('../classes/connect.php');
$db = connect('../pharmacie.db');
$n = $_GET['numero'];
$sql = $db->prepare("SELECT * FROM tb_produit_vendu where numero = :n");
$sql->bindValue(':n', $n);
$sql->execute();
$item = $sql->fetchAll();
$proID = array_column($item, 'codebare');
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
        <li><a href="index.php"><span class="c">C</span>AISSE</a></li>
        <li><a href="stock.php?pg=stock"><span class="c">S</span>TOCK</a></li>
        <li><a href="parametre.php?pg=parametre"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>

    <div id="Block2" class="col-md-10">
      <!-- app content -->
      <div class="bar" style="border-top:0.5px solid black;">
        <p class="text">DISPANSAIRE ANGLICAN</p>
      </div>
     
      <div class="title">
        <p class="titre"><span class="caisse">C</span>AISSE</p>
      </div>

      <!-- app content -->
      <div class="container-fluid">


        <div class="card1" style="width: 800px; height: 450px;">

          <form class="form-cliente" method="post" enctype="multipart/form-data" action="index.php?numero=<?=$_GET['numero']?>&total=<?=$_GET['total']?>">
            <div class="col-md-12">
              <label class="frmp">Mode de payement
                <select class="arg" name="pagamento">
                  <option>De l'argent</option>
                  <option>Mobile money</option>
                </select>
              </label>

              <label class="client">
                Client
                <input id="search" type="text" name="cliente" class="client1" placeholder="Nom ou numéro" required>
                <div id="match-list"></div>
              </label>

              <label>Total
                <input type="text" name="total" class="total" value="<?php echo $_GET['total']; ?>" disabled></label>
              <br />
              <br />


              <br />
              <br />

              <button type="submit" name="finaliser" style="background-color:#00a99d;color: white;border-color: black;cursor: pointer;width: 120px;height: 37px;margin-left: 100px;margin-top: 10px"> Facturer</button>
          </form>
        </div>
        <div class="col-md-4">
          <div class="card" style="width: 370px; height: 400px;margin-top: 20px">
            <br />
            <h3 style="margin-left: 60px">Liste de courses</h3>
            <br>
            <table class="table table-striped" cellspacing="0" cellpadding="0">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Le nom</th>
                  <th>La quantité</th>
                  <th>Prix</th>
                </tr>
              </thead>

              <?php
              foreach ($item as $value) :
              ?>
                <tbody>
                  <tr>

                    <td><?php echo $value['codebare'] ?></td>
                    <td><?php echo $value['nom'] ?></td>
                    <td><?php echo $value['quant'] ?></td>
                    <td><?php echo $value['valeur'] ?></td>
                  <?php
                endforeach;
                  ?>
                  </tr>
                </tbody>
            </table>

          </div>
        </div>
        <br />

      </div>

      <!-- fin app content -->
    </div>
  </content>

  <script src="../js/facture.js"></script>

</body>

</html>