<?php
session_start();
include('../classes/connect.php');
$db = connect('../pharmacie.db');
$n_NotaFiscal = $_GET['numero'];
$valor = $_GET['total'];
$month = date('m');
$year = date('y');

$sql= $db->prepare("SELECT * FROM `tb_profil`");
$sql->execute();
$profil= $sql->fetch();

if (isset($_GET['finaliser'])) {
    $data = date("d/m/y");
    $dbdate = date("m/d/y");
    $vendedor = $_SESSION['usuario'];
    $cliente = $_GET['client'];

    $mode = $_GET['mode'];

    $quer = $db->prepare("SELECT * FROM tb_produit_vendu where numero='$n_NotaFiscal'");
    $quer->execute();
    $pr = $quer->fetchAll();
    $benefice = array_column($pr, 'benefice');
    $benefice = array_sum($benefice);

    $sql = $db->prepare("INSERT INTO `tb_ventes` VALUES (null,?,?,?,?,?,?,?,?,?,1)");
    $sql->execute(array($valor, $dbdate, $vendedor, $cliente, $n_NotaFiscal, $mode, $month, $year, $benefice));

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
    header("location: ../invoice-detail.php?client=$cliNome&vendeur=$vendedor&total=$valor&numero=$n_NotaFiscal");
}
