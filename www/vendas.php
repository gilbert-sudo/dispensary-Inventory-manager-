 <?php
	$aa=$_GET['notaFiscal'];
?>

<?php

	include ("classes/Mysql.php");
    if(isset($_POST['acao'])){
		$id = $_POST['produto'];
		$sql = $db->prepare( "SELECT * from tb_produtos id where id = $id");
		$sql->execute();
		$pro = $sql->fetch();
		$nota_fiscal = $aa;
		$codBarras = $pro['codInterno'];
		$descricao = $pro['descricao'];
		$quant = $_POST['qty'];
		$valor = $pro['venda'];
	   $sql = $db->prepare( "INSERT INTO tb_venda_produtos (n_nota_fiscal, codBarras, descricao, quant, valor) VALUES (:n_nota_fiscal, :codBarras, :descricao, :quant, :valor)");
       $sql->bindValue(':n_nota_fiscal', $nota_fiscal);
       $sql->bindValue(':codBarras', $codBarras);
       $sql->bindValue(':descricao', $descricao);
       $sql->bindValue(':quant', $quant);
       $sql->bindValue(':valor', $valor);
	   $sql->execute();
	}

	if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_venda_produtos` WHERE id = $id" );
}
?>

<div class="container-fluid">

  

    <form   method="post"  enctype="multipart/form-data">

        <input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="notaFiscal" value="<?php echo $_GET['notaFiscal']; ?>" />
        <input type="text" id="search" placeholder="entrer le nom ou la reférance..." name="produto" style="width:650px;" required>
       

        <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 50px; height:30px; padding-top:6px; padding-bottom: 4px; margin-left: 6px; font-size:15px;margin-right: 5px;" / required>
        <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
        <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
        <Button type="submit" name="acao" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Ajouter</button>
    </form>
    <div class="match-list"></div>
    <br/>
    <table class="table table-bordered" id="resultTable" data-responsive="table" style="background-color: white">
        <thead>
        <tr>
            <th> Code</th>
            <th> La description </th>
            <th> Prix </th>
            <th> La quantité </th>
            <th> Action </th>
        </tr>
        </thead>
        <tbody>

        <?php

        $id=$_GET['notaFiscal'];

        $result = $db->prepare("SELECT * FROM tb_venda_produtos WHERE n_nota_fiscal=$id");
        $result->execute();
        for($i=1; $row = $result->fetch(); $i++){
            ?>
            <tr class="record">
                <td hidden><?php echo $row['codInterno']; ?></td>
                <td><?php echo $row['codBarras']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
                <td><?php echo $row['valor']; ?></td>

                <td><?php echo $row['quant']; ?></td>

                <td width="90"><a href="?pg=vendas&notaFiscal=<?php echo $aa ?>&deletar= <?php echo $row['id']; ?> "><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Annuler </button></a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th colspan="4"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
            <td colspan="1"><strong style="font-size: 12px; color: #222222;">
                    <?php

                    $sdsd=$_GET['notaFiscal'];
                    $resultas = $db->prepare("SELECT sum(valor*quant) FROM tb_venda_produtos WHERE n_nota_fiscal= :a");
                    $resultas->bindParam(':a', $sdsd);
                    $resultas->execute();
                    for($i=0; $rowas = $resultas->fetch(); $i++){
                        $fgfg=$rowas['sum(valor*quant)'];
                        echo $fgfg;
                    }
                    ?>
                </strong></td>
            
        </tr>

        </tbody>
    </table><br>
    <a href="?pg=pagamento&total=<?php echo $fgfg;?>&notaFiscal=<?php echo $aa?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Enregister</button></a>
</div>
