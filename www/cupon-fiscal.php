<?php
include( 'classes/Mysql.php' );
session_start(); ?>
<div align="center" id="GFG">
<?php

if (isset( $_POST['finalizar'] )) {
    $valor = $_GET['total'];
    $data = date( "d/m/y" );
    $vendedor = $_SESSION['usuario'];
    $cliente = $_POST['cliente'];
    $n_NotaFiscal = $_GET['cupon'];
    $pagamento = $_POST['pagamento'];

    $sql = $db->prepare( "INSERT INTO `tb_vendas` VALUES (null,?,?,?,?,?,?)" );
    $sql->execute( array($valor, $data, $vendedor, $cliente, $n_NotaFiscal, $pagamento) );

    if($cliente =='Non identifié'){

        $cliNome = "";
        $cliCpf = "";
        $cliEndereco ="" ;
        $cliTelefone = "";

    }else {
        $query = $db->prepare( "SELECT * FROM tb_clientes where nome= '$cliente'" );
        $query->execute();
        $clientes = $query->fetch();
        $cliNome = $clientes['nome'];
        $cliCpf = $clientes['cpf'];
        $cliEndereco = $clientes['endereco'];
        $cliTelefone = $clientes['telefone'];
    }
    $quer=$db->prepare("SELECT * FROM tb_venda_produtos where n_nota_fiscal='$n_NotaFiscal'");
    $quer->execute();
    $pr=$quer->fetchAll(); ?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="pdf" style="padding-bottom: 50px;">
   <h1 style="padding-top: 20;"><img src="img/farmacia-logo.ico"height="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GILBERT</h1>
    <table>
    <tr>
        <th>CNPJ: 23563245/100-04       </th>
        <th>IE:15000/015</th>
    </tr>
    <tr>
        <th>Villa de Gauche 432</th>
        <th>Tsimbazaza n°4</th>
</tr>
        <tr>
            <th>Téléphone: 0345511234</th>
        </tr>
    </table>
    <th><strong>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</strong></th>
    <table>

<tr>
    <th><?=$data;?></th>
    <th> </th>
    <th> </th>
    <th> </th>
    <th> </th>
    <th></th>
            <th>Numéro de coupon:<?=$n_NotaFiscal;?></th>
        </tr>
    </table>
   
    <h2>COUPON DE FACTURE</h2>
     <th><strong>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</strong></th>
    <table style="width: 300px; margin-left: 1px">
     <tr>
            <th>Code</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>TR</th>
            <th>Prix</th>
        </tr>
  <?php foreach ($pr as $value): ?>
        <tr>
        <th>
        <?=$value['codBarras'];?>
        </th>
        <th>
       <?=$value['descricao'];?>
        </th>
        <th>
        <?=$value['quant'];?>
        </th>
        <th>F1</th>
        <th>
        <?=$value['valor'];?>
        </th>
        </tr>
    <br/>
    <?php endforeach;?>
        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th><?=$valor?></th>
        </tr>


</table>
<table style="padding-top: 0px;">
    <tr>
    <th>Net à payer</th>
    
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
    <th><?=$valor." Ar"?></th>
</tr>
</table>
    <th><strong>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</strong></th>
<table>
        <tr>
            <th>Client: <?=$cliNome;?></th>
            <th></th>
            <th> </th>
            <th></th>
            <th> </th>
            <th>Cpf: <?=$cliCpf;?></th>
    </tr>
    <tr>
            <th>Adresse: <?=$cliEndereco;?></th>
        <th></th>
        <th></th>
        <th></th>
            <th> </th>
            <th>Tél: <?=$cliTelefone;?></th>
        </tr>
    </table>
    <th><strong>. . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .</strong></th>
    <table>
        <tr>
           <th> ECF:0001</th>
            <th></th>
            <th></th>
            <th></th>
            <th>Vendeur: <?=$vendedor;?></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?=$data;?></th>
    </tr>
    </table>
</div>
</html>
<?php } ?>
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
    <div align="center">
<button onclick="printDiv();" style="padding: 5px;">🖨️ Imprimer</button></div>