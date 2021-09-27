<?php
include( 'classes/Mysql.php' );
session_start();
?>
<?php


if (isset( $_POST['finalizar'] )) {
    $valor = $_GET['total'];
    $data = date( "d/m/y" );
    $vendedor = $_SESSION['nome'];
    $cliente = $_POST['cliente'];
    $n_NotaFiscal = $_GET['cupon'];
    $pagamento = $_POST['pagamento'];

    $sql = MySql::conectar()->prepare( "INSERT INTO `tb_vendas` VALUES (null,?,?,?,?,?,?)" );
    $sql->execute( array($valor, $data, $vendedor, $cliente, $n_NotaFiscal, $pagamento) );

    if($cliente =='Non identifié'){

        $cliNome = "";
        $cliCpf = "";
        $cliEndereco ="" ;
        $cliTelefone = "";

    }else {
        $query = MySql::conectar()->prepare( "SELECT * FROM tb_clientes where nome= '$cliente'" );
        $query->execute();
        $clientes = $query->fetch();
        $cliNome = $clientes['nome'];
        $cliCpf = $clientes['cpf'];
        $cliEndereco = $clientes['endereco'];
        $cliTelefone = $clientes['telefone'];
    }
    $quer=MySql::conectar()->prepare("SELECT * FROM tb_venda_produtos where n_nota_fiscal='$n_NotaFiscal'");
    $quer->execute();
    $pr=$quer->fetchAll();

    $html = "<html xmlns=\"http://www.w3.org/1999/html\" xmlns=\"http://www.w3.org/1999/html\">
<head>
    <link rel=\"stylesheet\" href=\"css/style.css\">
</head>
<div class=\"pdf\">
   <h1><img src=\"img/farmacia-logo.ico\"height=\"50px\">Farmacia Gama</h1>
    <table>
    <tr>
        <th>CNPJ: 23563245/100-04       </th>
        <th>IE:15000/015</th>
    </tr>
    <tr>
        <th>Julio de castilho 432</th>
        <th>Cachoeira do sul/RS</th>
</tr>
        <tr>
            <th>Telefone:37234456</th>
        </tr>
    </table>
    <hr size=\"1\" style=\"border:1px dashed black;\">
    <table>
<tr>
    <th>$data</th>
    <th> </th>
    <th> </th>
    <th> </th>
    <th> </th>
    <th></th>
            <th>Numero do cupon:$n_NotaFiscal</th>
        </tr>
    </table>
    <hr size=\"1\" style=\"border:1px dashed black;\">
    <h2 style=\"margin-left: 60px\">CUPON FISCAL</h2>
    <table style=\"width: 300px; margin-left: 1px\">
     <tr>
            <th>Cod</th>
            <th>Desc</th>
            <th>Quant</th>
            <th>TR</th>
            <th>Valor</th>
        </tr>";
    foreach ($pr as $value):
        $html.="<tr>";
        $html.="<th>";
        $html.=$value['codBarras'];
        $html.="</th>";
        $html.="<th>";
        $html.=$value['descricao'];
        $html.="</th>";
        $html.="<th>";
        $html.=$value['quant'];
        $html.="</th>";
        $html.="<th>F1</th>";
        $html.="<th>";
        $html.=$value['valor'];
        $html.="</th>";
        $html.="</tr>";
    endforeach;
    $html.="<br/>
        <tr>
            <th>Total</th>
            <th></th>
            <th></th>
            <th></th>
            <th>R$$valor</th>
        </tr>

<tr>
    <th>$pagamento</th>
    <th></th>
    <th></th>
    <th></th>
    <th>R$$valor</th>
</tr>

</table>
    <hr size=\"1\" style=\"border:1px dashed black;\">
<table>
        <tr>
            <th>Cliente:$cliNome</th>
            <th></th>
            <th> </th>
            <th></th>
            <th> </th>
            <th>Cpf:$cliCpf</th>
    </tr>
    <tr>
            <th>Endereco:$cliEndereco</th>
        <th></th>
        <th></th>
        <th></th>
            <th> </th>
            <th>Telefoene:$cliTelefone</th>
        </tr>
    </table>
    <hr size=\"1\" style=\"border:1px dashed black;\">
    <table>
        <tr>
           <th> ECF:0001</th>
            <th></th>
            <th></th>
            <th></th>
            <th>Vendedor:$vendedor</th>
            <th></th>
            <th></th>
            <th></th>
            <th>$data</th>
    </tr>
    </table>
</div>
</html>";

}?>
<?php
require_once( 'dompdf/autoload.inc.php' );
// Incluindo o autoload do DOM PDF
//Criando a instancia do Dom PDF.
//Criando o namespace para evitar erros
use Dompdf\Dompdf;
// Instanciando a classe do Dom DPF
$dompdf = new Dompdf();
//Criando o código HTML que será transformado em pdf
$dompdf->loadHtml($html);
//Define o tipo de papel de impressão (opcional)
//tamanho (A4, A3, A2, etc)
//oritenação do papel:'portrait' (em pé) ou 'landscape' (deitado)
$dompdf->setPaper('A4', 'landscape');

// Vai renderizar o HTML como PDF
$dompdf->render();

// Saída do pdf para a renderização do navegador.
//Coloca o nome que deseja que seja renderizado.
$dompdf->stream("cupon Fiscal.pdf", array(true));

?>