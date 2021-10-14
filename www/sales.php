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
        #total{
            height: 30px;
            padding: 10px;
        }
        #total1{
            margin-top: 13px;
        }
        #list{
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
                    <li <?php if (!isset($_GET['pg'])) {
                            print 'class="active"';
                        } ?>>
                        <a href="#">
                            <i class="pe-7s-cart"></i>
                            <p>Ventes</p>
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
                        $date = date('m/d/y');

                        $numRows = 0;
                        $itemsPerPage = 50;
                        $totalItemReq = $db->query("SELECT id FROM tb_produit_vendu WHERE date = '$date'");
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
                        $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE date = '$date'");
                        $sql->execute();
                        $totals = $sql->fetchAll();
                        $total = 0;
                        $totalQuant = array_column($totals, 'quant');
                        $totalnbr = count(array_column($totals, 'quant'));
                        $totalPrice = array_column($totals, 'valeur');
                        for ($i=0; $i < $totalnbr; $i++) { 
                            $total2 = intval($totalQuant[$i]) * intval($totalPrice[$i]);
                            $total = $total + $total2;
                        }
                        $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE date = '$date'");
                        $sql->execute();
                        $andranas = $sql->fetchAll();
                        $andranas = array_column($andranas, 'date');
                        
                        $sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE date = '$date' LIMIT $begin,$itemsPerPage");
                        $sql->execute();
                        $produtos = $sql->fetchAll();
                        ?>


                        <div class="lista-cliente">

                            <div id="top" class="row">
                                <div class="col-sm-7">
                                    <h2>Ventes d'aujourd'hui</h2>
                                </div>
                               <a class="btn btn-primary" href="sales.php" style="margin-top: 35px; margin-left:20%;"><i class="fa fa-refresh"></i> Actualiser</a>
                                <table style="position: absolute; margin-left:20px;">
                                    <td><h4 id="total1">Total ventes:</h4> </td>
                                    <td><input type="text" name="total" value="<?=number_format($total, 2).' Ar';?>" disabled id="total"></td>
                                </table>
                            </div>

                            <div id="list" class="row">

                                <div class="table-responsive col-md-12">
                                    <table class="table table-striped" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Description</th>
                                                <th>Quantité</th>
                                                <th>p.u</th>
                                                <th>prix</th>
                                                <th class="actions">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <?php foreach ($produtos as $value) : ?>
                                                    <td><?php echo $value['id'] ?></td>
                                                    <td><?php echo $value['nom'] ?></td>
                                                    <td><?php echo $value['quant'] ?></td>
                                                    <td><?php echo $value['valeur'] ?></td>
                                                    <td><?php echo ($value['valeur']*$value['quant']) ?></td>
                                                    <td class="actions">
                                                        <a class="btn btn-success btn-xs" href="?pg=visualizar-produto&id=<?php echo $value['id']; ?>">Regarder</a>
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
                                                echo '<li class="prev"><a href="?pg=produtos&page=' . ($prev) . '" rel="next">&lt; Précedant</a></li>';
                                            } else {
                                                echo '<li><a href="#">&lt; Précedant</a></li>';
                                            }
                                            ?>
                                            <?php for ($i = 1; $i < $totalPages; $i++) {
                                                if ($i == $currentPage) {
                                                    echo '<li><a  style="background-color: #75aca8; color:white;" href="#">' . $i . '</a></li>';
                                                } else {
                                                    echo '<li><a href="?pg=produtos&page=' . $i . '">' . $i . '</a></li>';
                                                }
                                            } ?>
                                            <?php if ($currentPage < ($totalPages - 1)) {
                                                echo '<li class="next"><a href="?pg=produtos&page=' . (++$currentPage) . '" rel="next">Suivant &gt;</a></li>';
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