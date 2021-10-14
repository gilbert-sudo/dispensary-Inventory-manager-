<?php
require_once('../classes/connect.php');
$db = connect('../pharmacie.db');
$result = $db->prepare("SELECT * FROM tb_produtos ORDER BY descricao ASC");
$result->execute();
$items = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/liste.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/logout.css">
  <title>Logiciel vente</title>
</head>

<body>
  <content>
    <div id="Block1" class="col-md-2">
      <img class="logo" src="img/logo.png">
      <ul class="menu">
        <li><a href="index.php"><span class="c">C</span>AISSE</a></li>
        <li><a href="stock.php"><span class="c">S</span>TOCK</a></li>
        <li><a href="parametre.php"><span class="c">P</span>ARAMETRE</a></li>
      </ul>
    </div>
    <div id="Block2" class="col-md-10">
      <div class="bar" align="center">
        <table>
          <td>
            <p class="text">DISPENSAIRE ANGLICAN TSINJOHASINA</p>
          </td>
          <td><a href="../logout.php" class="btn btn-danger loggout">Se déconnecter</a></td>
        </table>
      </div>
      <div class="title">
        <p class="titre" style="width: 200px;"><span class="caisse">📦</span>Stock</p>
      </div>
      <div class="other" align="center">
        <ul class="colonne4">
          <li class="code"><a>code</a></li>
          <li class="nm"><a>nom</a></li>
          <li class="prix"><a>prix</a></li>
          <li class="stock"><a>en stock</a></li>
        </ul>
        <div class="liste" style="overflow-y: scroll; max-height: 280px;">
          <?php
          $count = 0;
          foreach ($items as $value) :
            $count++;
            if ($count < 10) {
              $count = '0' . $count;
            } else {
              $count = $count;
            }
          ?>
            <ul class="colonne5">
              <li class="id"><a><?= $count ?></a></li>
              <li><input class="c1" type="text" name="cd" <?= ($value['quantidade'] == 0 ? 'style="color:red"' : ''); ?> value="<?= $value['codInterno'] ?>" placeholder="aucun" disabled></li>
              <li><input class="c2" type="text" name="name" <?= ($value['quantidade'] == 0 ? 'style="color:red"' : ''); ?> value="<?= $value['descricao'] ?>" placeholder="aucun" disabled></li>
              <li><input class="c3" type="text" name="pu" <?= ($value['quantidade'] == 0 ? 'style="color:red"' : ''); ?> value="<?= $value['venda'] ?>" placeholder="0 Ar" disabled></li>
              <li><input class="c4" type="text" name="qt" <?= ($value['quantidade'] == 0 ? 'style="color:red"' : ''); ?> value="<?= $value['quantidade'] ?>" placeholder="00" disabled></li>
            </ul>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="bouton2">
        <button>Recherche</button>
        <button style="width: 240px;"><a href="#">Annuler une vente</a></button>
      </div>
    </div>
  </content>

</body>

</html>