<?php
session_start();
include('classes/Sistema.php');
?>
<?php

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

</head>

<body>

    <div class="wrapper">

        <div class="sidebar" data-image="img/aa.jpg" style="background-color: #00ffee;">


            <div class="sidebar-wrapper">
                <div class="logo">
                    <img src="img/farmacia-logo.png" alt="logo" width="60px">
                    <p>Pharmacie GILBERT</p>
                </div>

                <ul class="nav">
                    <li <?php if (!isset($_GET['pg'])) {
                            print 'class="active"';
                        } ?>>
                        <a href="main.php">
                            <i class="pe-7s-home"></i>
                            <p>Page d'accueil</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "usuario") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=usuario">
                            <i class="pe-7s-user"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "caisse") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=caisse">
                            <i class="pe-7s-user"></i>
                            <p>Caisse</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "cliente") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=cliente">
                            <i class="pe-7s-users"></i>
                            <p>Les clients</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "produtos") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=produtos">
                            <i class="pe-7s-bandaid"></i>
                            <p>Produits</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "fornecedores") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=fornecedores">
                            <i class="pe-7s-car"></i>
                            <p>Fournisseurs</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "relatorio_clientes") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=relatorio_clientes">
                            <i class="pe-7s-graph2"></i>
                            <p>Rapports</p>
                        </a>
                    </li>
                    <li <?php if (isset($_GET['pg'])) {
                            if ($_GET['pg'] == "extras") {
                                print 'class="active"';
                            }
                        } ?>>
                        <a href="?pg=extras">
                            <i class="pe-7s-tools"></i>
                            <p>Suppléments</p>
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
                        <div class="navbar-brand" onclick="return window.confirm('Voulez-vous vraiment allez vers la caisse ?');"> <i class="pe-7s-cart"></i> <a href="caisse/index.php" style="color: #00a99d;text-decoration: none;">La caisse</a></div>
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
                        Sistema::carregarPagina();
                        ?>

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
                        GILBERT SOFTWARE
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