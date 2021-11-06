<?php
session_start();
include('classes/Mysql.php');
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
                    <li class="active">
                        <a href="#">
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
                        <?php
                        // pagination
                        if (isset($_GET['date_invoice'])) {
                            $date = $_GET['date_invoice'];
                            $date = date_parse($date);
                            $day = $date['day'];
                            $month = $date['month'];
                            $year = $date['year'];
                            $year = substr($year, 2);
                            $date = $month . '/' . $day . '/' . $year;
    
                        } else {
                            $date = date('m/d/y');
                        }
                        $numRows = 0;
                        $itemsPerPage = 30;

                        $totalItemReq = $db->query("SELECT id FROM tb_ventes WHERE date = '$date'");

                        while ($row = $totalItemReq->fetch(SQLITE3_ASSOC)) {
                            ++$numRows;
                        }
                        $totalItem = $numRows;
                        $totalPages = ceil($totalItem / $itemsPerPage) + 1;
                        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $totalItem) {
                            $_GET['page'] = intval($_GET['page']);
                            $currentPage = $_GET['page'];
                        } else {
                            $currentPage = 1;
                        }

                        $begin = ($currentPage - 1) * $itemsPerPage;
                        //end pagination
                        $sql = $db->prepare("SELECT * FROM tb_ventes WHERE date = '$date'");

                        $sql->execute();
                        $andranas = $sql->fetchAll();
                        $andranas = array_column($andranas, 'date');
                            $sql = $db->prepare("SELECT * FROM `tb_ventes` WHERE date = '$date' LIMIT $begin,$itemsPerPage");
                        $sql->execute();
                        $produtos = $sql->fetchAll();
                        ?>


                        <div class="lista-cliente">

                            <div id="top" class="row">
                                <div class="col-sm-6">
                                    <h2>Les factures</h2>
                                </div>
                                <div class="col-sm-6" style="margin-top: 35px;">
                                    <a class="btn btn-primary" href="#"><i class="fa fa-refresh"></i> Détailler</a>
                                    <a class="btn btn-default" href="sales.php"><i class="fa fa-refresh"></i> Aujourd'hui</a>
                                </div>

                            </div>

                            <div class="row">
                                <table style="position: absolute; margin-left:20px;">
                                    <td>
                                        <h4 id="total1">Date de la vente:</h4>
                                    </td>
                                    <form action="#" method="get">
                                        <div align="right">
                                            <td>
                                                <input type="date" name="date_invoice" size="1" style="margin:0 10px 0 20px; height: 40px; padding: 5px; border: 2px solid #1D62F0;">
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" type="submit">🔍</button>
                                            </td>
                                        </div>
                                    </form>

                                </table>
                            </div>

                            <div id="list" class="row">

                                <div class="table-responsive col-md-12">
                                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Numéro</th>
                                                <th>Client</th>
                                                <th>Vendeur</th>
                                                <th>montant</th>
                                                <th class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <?php foreach ($produtos as $value) : ?>
                                                    <td><?php echo $value['id'] ?></td>
                                                    <td><?php echo $value['n_NotaFiscal'] ?></td>
                                                    <td><?php echo $value['client'] ?></td>
                                                    <td><?php echo $value['vendeur'] ?></td>
                                                    <td><?php echo ($value['prix']) ?></td>
                                                    <td class="actions">
                                                        <a class="btn btn-success btn-xs" href="invoice-detail.php?client=<?=$value['client']?>&vendeur=<?=$value['vendeur']?>&total=<?=($value['prix'])?>&numero=<?=($value['n_NotaFiscal'])?>">Regarder</a>
                                                        <a class="btn btn-danger btn-xs" href="invoice-cancel.php?client=<?=$value['client']?>&vendeur=<?=$value['vendeur']?>&total=<?=($value['prix'])?>&numero=<?=($value['n_NotaFiscal'])?>">Annuler</a>
                                                    </td>
                                            </tr>
                                        <?php
                                                endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="bottom" class="row">
                                    <div class="col-md-12">
                                        <ul class="pagination">
                                            <?php if ($currentPage != 1) {
                                                $prev = $currentPage - 1;
                                                echo '<li class="prev"><a href="?pg=sales&page=' . ($prev) . '" rel="next">&lt; Précedant</a></li>';
                                            } else {
                                                echo '<li><a href="#">&lt; Précedant</a></li>';
                                            }
                                            ?>
                                            <?php for ($i = 1; $i < $totalPages; $i++) {
                                                if ($i == $currentPage) {
                                                    echo '<li><a  style="background-color: #75aca8; color:white;" href="#">' . $i . '</a></li>';
                                                } else {
                                                    echo '<li><a href="?pg=sales&page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            } ?>
                                            <?php if ($currentPage < ($totalPages - 1)) {
                                                echo '<li class="next"><a href="?pg=sales&page=' . (++$currentPage) . '" rel="next">Suivant &gt;</a></li>';
                                            } else {
                                                echo '<li class="next"><a href="#" rel="next">Suivant &gt;</a></li>';
                                            }
                                            ?>

                                        </ul><!-- /.pagination -->
                                    </div>
                                </div> <!-- /#bottom -->
                            </div>
                        </div>
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            GILBERT Madagascar
                        </p>
                    </div>
                </footer>
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