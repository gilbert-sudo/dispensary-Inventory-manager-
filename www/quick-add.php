<?php
include('classes/Mysql.php');
$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM `tb_produtos` WHERE id = $id");
$sql->execute();
$produtos = $sql->fetch();
?>
<div class="cadastro-cliente">
    <h3 class="page-header">Ajout rapide de stock:</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=visualizar-produto&id=<?=$id?>&old_quant=<?=$produtos['quantidade'];?>">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Pour le produit&nbsp;&nbsp;&nbsp; <span style="font-size: 30px;">#<?=$produtos['codInterno'];?></span></label>
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-4">
                <span style="font-size: 30px;">La quantité</span>
            </div>
            <div class="form-group col-md-4">
                <input type="number" min="0" oninput="validity.valid||(value='');" required type="number" class="form-control" name="quantity" placeholder="Entrez la quantité du produit" style="border-color: black;">
            </div>

        </div>



</div>

<hr>
<?php showErr(); ?>
<hr />

<div class="row" style="margin-left: 100px;">
    <div class="col-md-12">
        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
        <a href="?pg=visualizar-produto&id=<?=$id?>" class="btn btn-danger">Annuler</a>
    </div>
</div>

</form>
</div>