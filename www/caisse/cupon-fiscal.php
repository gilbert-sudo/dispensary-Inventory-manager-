<?php
$n_NotaFiscal = $_GET['numero'];
$valor = $_GET['total'];

if (isset($_GET['finaliser'])) {
    $data = date("d/m/y");
    $vendedor = $_SESSION['usuario'];
    $cliente = $_GET['client'];

    $mode = $_GET['mode'];

    $sql = $db->prepare("INSERT INTO `tb_ventes` VALUES (null,?,?,?,?,?,?)");
    $sql->execute(array($valor, $data, $vendedor, $cliente, $n_NotaFiscal, $mode));

    if ($cliente == 'Non identifié') {

        $cliNome = "";
        $cliEndereco = "";
        $cliTelefone = "";
    } else {
        $query = $db->prepare("SELECT * FROM tb_clientes where nome= '$cliente'");
        $query->execute();
        $clientes = $query->fetch();
        $cliNome = $clientes['nome'];
        $cliEndereco = $clientes['endereco'];
        $cliTelefone = $clientes['numero'];
    }

    $quer = $db->prepare("SELECT * FROM tb_produit_vendu where numero='$n_NotaFiscal'");
    $quer->execute();
    $pr = $quer->fetchAll();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <title>Logiciel vente</title>
    </head>

    <body onload="printDiv();">

        <content>

            <!-- app content -->
            <div class="printdiv" style="    display: block; height: 0; overflow: hidden;">
                <div align="center" id="GFG" style="overflow-y: scroll;">

                    <html>

                    <head>
                    </head>
                    <div class="pdf" style="padding-bottom: 50px;">
                        <h1 style="padding-top: 20;"><img src="../img/farmacia-logo.ico" height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GILBERT</h1>
                        <table style="width: 80%;">
                            <tr>
                                <th style="text-align: start;">CNPJ: 23563245/100-04</th>
                                <th style="text-align: end;">IE:15000/015</th>
                            </tr>
                            <tr>
                                <th style="text-align: start;">Villa de Gauche 432</th>
                                <th style="text-align: end;">Tsimbazaza n°4</th>
                            </tr>
                            <tr>
                                <th style="text-align: start;">Téléphone: 0345511234</th>
                            </tr>
                        </table>
                        <th><strong style="display: flex;">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </strong></th>
                        <table>

                            <tr>
                                <th><?= $data; ?></th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                                <th></th>
                                <th>Numéro de coupon:<?= $n_NotaFiscal; ?></th>
                            </tr>
                        </table>

                        <h2>FICHE DE FACTURE</h2>
                        <th style="margin-bottom: 0px;"><strong style="display: flex;">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </strong></th>
                        <table style="width: 80%; margin-left: 1px">
                            <tr>
                                <th style="text-align:start ;padding-left: 50px;">Produit</th>
                                <th>Quantité</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>P.U</th>
                                <th>Prix</th>
                            </tr>
                            <?php foreach ($pr as $value) : ?>
                                <tr>
                                    <th style="text-align:left; padding-left:5px; margin:0px;">
                                        <?= $value['nom']; ?>
                                    </th>
                                    <th>
                                        <?= $value['quant']; ?>
                                    </th>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                    <th style="text-align: end;">
                                        <?= $value['valeur']; ?>
                                    </th>
                                    <th style="text-align: end;">
                                        <?= ($value['quant']*$value['valeur']); ?>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th style="text-align:left; padding:0px; margin:0px;">Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="text-align: end;"><?= $valor ?></th>
                            </tr>


                        </table>
                        <table style="padding-top: 0px; display:flex; justify-content:flex-end; margin-right:96px;">
                            <tr style="border:1px dotted;">
                                <th>Net à payer</th>

                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                <th><?= $valor . " Ar" ?></th>
                            </tr>
                        </table>
                        <th><strong style="display: flex;">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </strong></th>
                        <table style="display: flex; justify-content:flex-end; margin-right: 96px;">
                            <tr>
                                <th>Client: <?php if (isset($cliNome)) {
                                                echo $cliNome;
                                            } else {
                                                echo 'Non identifié';
                                            } ?></th>
                                <th></th>
                                <th> </th>
                                <th></th>
                                <th> </th>
                                <th>n°: <?php if (isset($cliTelefone)) {
                                                echo $cliTelefone;
                                            } else {
                                                echo 'Non identifié';
                                            } ?></th>
                            </tr>
                        </table>
                        <th><strong style="display: flex;">. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . </strong></th>
                        <table style="display: flex; justify-content:flex-end; margin-right:96px;">
                            <tr>
                                <th> ECF:0001</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Vendeur: <?= $vendedor; ?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th><?= $data; ?></th>
                            </tr>
                        </table>
                    </div>

                    </html>
                <?php } ?>
                </div>
            </div>
            <script>
                function printDiv() {
                    var divContents = document.getElementById("GFG").innerHTML;
                    var a = window.open('', '', 'height=700, width=1000');
                    a.document.write('<div align="center">');
                    a.document.write(divContents);
                    a.document.write('</div>');
                    a.document.close();
                    a.print();
                }
            </script>


            <!-- fin app content -->
        </content>

        <script src="../js/caisse.js"></script>
    </body>

    </html>