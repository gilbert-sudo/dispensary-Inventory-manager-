<!-- fetch data from rapport table -->
<?php
require_once('../classes/connect.php');
$db = connect('../pharmacie.db');

$year = date('y');
$result = $db->prepare("SELECT * FROM tb_rapport_finance WHERE an = $year");
$result->execute();
$resul = $result->fetchAll();

foreach ($resul as $res) {
    $benefice[] = $res['benefice'];
    $mois[] = $res['mois'];
}
if (isset($mois) && isset($benefice)) {
    $label = json_encode($mois);
    $series1 = json_encode($benefice);
} else {
    $mois = [];
    $benefice = [];
    $label = json_encode($mois);
    $series1 = json_encode($benefice);
}


$sql = $db->prepare("SELECT * FROM `tb_profil`");
$sql->execute();
$profil = $sql->fetch();
?>
<!-- end fetch data from rapport table -->

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets2/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets2/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="assets2/css/css.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets2/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets2/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets2/css/demo.css" rel="stylesheet" />
    <link href="../css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="black" data-image="../img/aa.jpg" style="background-color: #00ffee;">
            <div class="sidebar-wrapper" style="overflow: hidden;">
                <div class="logo">
                    <img src="../img/farmacia-logo.png" alt="logo" width="60px">
                    <p><?php echo $profil['name']; ?></p>
                </div>

                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../main.php">
                            <i class="pe-7s-home"></i>
                            <p>Page d'accueil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../main.php?pg=profil" class="nav-link">
                            <i class="pe-7s-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=usuario">
                            <i class="pe-7s-user"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=caisse">
                            <i class="pe-7s-headphones"></i>
                            <p>Caisse</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=cliente">
                            <i class="pe-7s-users"></i>
                            <p>Les clients</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=categorie">
                            <i class="pe-7s-ticket"></i>
                            <p>Catégories</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=produtos">
                            <i class="pe-7s-bandaid"></i>
                            <p>Produits</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=fornecedores">
                            <i class="pe-7s-car"></i>
                            <p>Fournisseurs</p>
                        </a>
                    </li>
                    <li class="active">
                        <a class="nav-link" href="#">
                            <i class="pe-7s-graph2"></i>
                            <p>Rapports</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../main.php?pg=extras">
                            <i class="pe-7s-server"></i>
                            <p>Suppléments</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../caisse/index.php" onclick="return window.confirm('Voulez-vous vraiment allez vers la caisse ?');"><i class="pe-7s-cart"></i> La caisse </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="../logout.php">
                                    <i class="pe-7s-power">Se déconnecter</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-header ">
                                <h4 class="card-title">Rapports des ventes</h4>
                                <p class="card-category">Tous les produits sont hors Taxes</p>
                            </div>
                            <div class="card-body ">
                                <div id="chartActivity" class="ct-chart"></div>
                            </div>
                            <div class="card-footer ">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Bénéfice et
                                    <i class="fa fa-circle text-danger"></i> Chiffre d'affaire
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> Data information certified ✅
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->
<script src="assets2/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets2/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets2/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets2/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets2/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets2/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets2/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets2/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        var data = {
            labels: <?= $label ?>,
            series: [
                <?= $series1 ?>,
            ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "250px",
            chartPadding: {
                top: 0,
                right: 5,
                bottom: 0,
                left: 60
            }
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];

        var chartActivity = Chartist.Bar('#chartActivity', data, options, responsiveOptions);

        demo.showNotification();

    });
</script>

</html>