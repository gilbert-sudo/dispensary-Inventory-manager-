<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');
$numero = $_GET['numero'];

$sql = $db->prepare("SELECT * FROM `tb_produit_vendu` WHERE numero = $numero");
$sql->execute();
$items = $sql->fetchAll();
// UPDATE PRODUCT QUANTITY
foreach ($items as $item) {
    $code = $item['codebare'];
    $sql = $db->prepare("SELECT * FROM `tb_produtos` WHERE codInterno = '$code'");
    $sql->execute();
    $old_item = $sql->fetch();
    $new_quatite = $old_item['quantidade'] + $item['quant'];
    $sql = $db->prepare("UPDATE `tb_produtos` SET quantidade = $new_quatite WHERE codInterno = '$code'");
    $sql->execute();
    // DELETE PRODUCT FROM THE tb_produit_vendu
    $sql = $db->prepare("DELETE FROM `tb_produit_vendu` WHERE numero = $numero");
    $sql->execute();
    // END DELETE PRODUCT FROM THE tb_produit_vendu
}
// END UPDATE PRODUCT QUANTITY
// fetch data from tb_ventes
$sql = $db->prepare("SELECT * FROM `tb_ventes` WHERE n_NotaFiscal = $numero");
$sql->execute();
$vente = $sql->fetch();
$mois = $vente['mois'];
$year = $vente['an'];
switch ($mois) {
    case ('1'):
        $mois = 'Jan';
        break;
    case ('2'):
        $mois = 'Fev';
        break;
    case ('3'):
        $mois = 'Mar';
        break;
    case ('4'):
        $mois = 'Avr';
        break;
    case ('5'):
        $mois = 'Mai';
        break;
    case ('6'):
        $mois = 'Jui';
        break;
    case ('7'):
        $mois = 'Jul';
        break;
    case ('8'):
        $mois = 'Aou';
        break;
    case ('9'):
        $mois = 'Sep';
        break;
    case ('10'):
        $mois = 'Oct';
        break;
    case ('11'):
        $mois = 'Nov';
        break;
    case ('12'):
        $mois = 'Dec';
        break;
    default:
        $mois = '...';
        break;
}
$month = $mois;
//fetch data from tb_rapport_finance
$sql = $db->prepare("SELECT * FROM `tb_rapport_finance` WHERE mois = '$month' AND an = '$year'");
$sql->execute();
$rapport = $sql->fetch();
$old_benefice = $rapport['benefice'];
$old_ca = $rapport['ca'];
// update tb_rapport_finance
$new_benefice = $old_benefice - $vente['benefice'];
$new_ca = $old_ca - $vente['prix'];
$sql = $db->prepare("UPDATE `tb_rapport_finance` SET benefice = $new_benefice, ca = $new_ca WHERE mois = '$month' AND an = '$year'");
$sql->execute();
// end update tb_rapport_finance
// delete from tb_ventes
$sql = $db->prepare("DELETE FROM `tb_ventes` WHERE n_NotaFiscal = $numero");    
$sql->execute();
// end delete from tb_ventes
header('Location: ../invoices.php');