<?php
include('classes/Mysql.php');

$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto = $sql->fetch();



?>
<div class="cadastro-cliente">
    <h3 class="page-header">Editer un produit</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=produtos&id=<?=$id?>">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" required type="text" class="form-control" name="descricao" value="<?php echo $produto['descricao']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Code interne</label>
                <input type="text" required type="text" class="form-control" name="codInterno" value="<?php echo $produto['codInterno']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-5">
                <label for="exampleInputEmail1">Fournisseur</label>
                <input type="text" required type="text" class="form-control" name="fornecedor" value="<?php echo $produto['fornecedor']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label>Prix d'achat</label>
                <input type="number" required type="number" class="form-control" name="custo" value="<?php echo $produto['custo'] ?>">
            </div>

            <div class="form-group col-md-3">
                <label>Prix de vente</label>
                <input type="number" required type="number" class="form-control" name="venda" value="<?php echo $produto['venda'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label>Quantité</label>
                <input type="number" required type="number" class="form-control" name="quantidade" value="<?php echo $produto['quantidade']; ?>">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-md-5">
                <label>Description</label>
                <input type="text" required type="text" class="form-control" name="principio" value="<?php echo $produto['principio'] ?>">
            </div>

        </div>


        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Sauvegarder</button>
                <a href="?pg=produtos" class="btn btn-default">Annuler</a>
            </div>
        </div>

    </form>
</div>