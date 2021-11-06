<?php
session_start();
include('classes/Mysql.php');
$date = date('m/d/y');
$date2 = date_parse("$date");
$jour = $date2['day'];
$mois = $date2['month'];
$annee = $date2['year'];
if (isset($_GET['numero'])) {
$numero = $_GET['numero'];
$vendeur = $_GET['vendeur'];
$client = $_GET['client'];
$req_num_client = $db->query("SELECT * FROM tb_clientes WHERE nome = '$client'");
$num_client = $req_num_client->fetch();
}
$mysql = $db->query("SELECT * FROM tb_profil");
$mysql->execute();
$row = $mysql->fetch();
?>
<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dispensaire</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />

    <link href="css/style.css" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href='css/css' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        #total {
            height: 30px;
            padding: 10px;
        }

        #total1 {
            margin-top: 13px;
        }

        #list {
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="wrapper">

        <div class="sidebar" data-image="img/aa.jpg" style="background-color: #00ffee;">


            <div class="sidebar-wrapper">
                <div class="logo">
                    <img src="img/farmacia-logo.png" alt="logo" width="60px">
                    <p>Dispensaire SAHASOA</p>
                </div>

                <ul class="nav">
                    <li>
                        <a href="sales.php">
                            <i class="pe-7s-cart"></i>
                            <p>Ventes</p>
                        </a>
                    </li>
                    <li  class="active">
                        <a href="invoices.php">
                            <i class="pe-7s-news-paper"></i>
                            <p>Factures</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand"> <i class="pe-7s-cart"></i> <a href="caisse/index.php" style="color: #00a99d;text-decoration: none;">La caisse</a></div>
                    </div>
                    <div class="collapse navbar-collapse">


                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="logout.php">
                                    <i class="pe-7s-power">Se déconnecter</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="lista-cliente">
                            <h5 style="text-align:right;">Le <?= $jour . "/" . $mois . "/" . $annee ?></h5>
                            <h5>RNPM: <?=$row['name']?></h5>
                            <h5>RNPM: <?=$row['cnpj']?></h5>
                            <h5><?=$row['Adresse']?></h5>
                            <h5>Téléphone: <?=$row['telephone']?></h5>
                            <h6 style='text-align:center;'>FICHE DE FACTURE N°: <?=$numero?></h6>
   
                            <?php
                            $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE numero = $numero");
                            $sql->execute();
                            $totals = $sql->fetchAll();
                            $total = 0;
                            $count = 0;
                            $totalQuant = array_column($totals, 'quant');
                            $totalnbr = count(array_column($totals, 'quant'));
                            $totalPrice = array_column($totals, 'valeur');
                            for ($i = 0; $i < $totalnbr; $i++) {
                                $total2 = intval($totalQuant[$i]) * intval($totalPrice[$i]);
                                $total = $total + $total2;
                            }

                            $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE numero = $numero");

                            $sql->execute();
                            $andranas = $sql->fetchAll();
                            $andranas = array_column($andranas, 'date');
                            $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE numero = $numero");
                            $sql->execute();
                            $produtos = $sql->fetchAll();
                            ?>



                            <div class="table-responsive col-md-12">
                                <table class="table table-striped" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Description</th>
                                            <th style="text-align:right">Quantité</th>
                                            <th style="text-align:right">p.u</th>
                                            <th style="text-align:right">prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <?php foreach ($produtos as $value) : ?>
                                                <td><?php echo ++$count; ?></td>
                                                <td style="min-width: 300px;"><?php echo $value['nom'] ?></td>
                                                <td style="text-align:right"><?php echo $value['quant'] ?></td>
                                                <td style="text-align:right"><?php echo $value['valeur'] ?></td>
                                                <td style="text-align:right"><?php echo ($value['valeur'] * $value['quant']) ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:right"><strong>Net à payer</strong></td>
                                        <td style="text-align:right"><strong><?php echo $total; ?></strong></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                           
                            <h5 style="text-align:right;">Client:&nbsp;<?= $client ?> &nbsp;&nbsp;N°:<?=$num_client['numero']?></h5>
                            <h5><strong>Vendeur:&nbsp;</strong><?= $vendeur ?></h5>
                        </div>
                    </div>
                </div>


             
            </div>
        </div>
</body>

<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery.min.js"></script>
<script src="js/demo.js"></script>
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>
<script src="js/search.js"></script>

</html>