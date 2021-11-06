<?php
include('classes/Mysql.php');

$id = $_GET['id'];
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
}

$sql = $db->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto = $sql->fetch();



?>
<div class="cadastro-cliente">
    <h3 class="page-header">Editer un produit</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=produtos&id=<?=$id?>&page=<?=$currentPage?>">

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
                <input  min="0" step="0.1" oninput="validity.valid||(value='');"  required type="number" class="form-control" name="quantidade" value="<?php echo $produto['quantidade']; ?>">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-sm-5">
                <label for="exampleInputEmail1">Catégorie: </label>
                <?php
                $sql = $db->prepare("SELECT * FROM tb_categorie");
                $sql->execute();
                $reg = $sql->fetchAll();
                $a = count($reg);
                $cont = 0;
                ?>
                <select name="principio" size="1" style="width: 292px; height: 38px; border-radius: 4px">
                    <option value="<?php echo $produto['principio']; ?>">
                        <?php echo $produto['principio'] ?>
                    </option>
                    <?php while ($cont < $a) { ?>
                        <option value="<?php echo $reg[$cont]['nom']; ?>">
                            <?php echo $reg[$cont]['nom'] ?>
                        </option>
                    <?php $cont++;
                    }
                    ?>

                </select>
            </div>

        </div>


        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Sauvegarder</button>
                <a href="?pg=produtos&page=<?=$currentPage?>" class="btn btn-default">Annuler</a>
            </div>
        </div>

    </form>
</div>