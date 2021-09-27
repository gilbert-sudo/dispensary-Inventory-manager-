<?php
include ('classes/Mysql.php');
$id=$_GET['id'];
$sql= $db->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto= $sql->fetch();


?>



<h3 class="page-header">Produit n° <?php echo $produto['id']?></h3>

<div class="row">
    <div class="col-md-4">
        <p><strong>Dscription</strong></p>
        <p><?php echo $produto['descricao']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Code interne</strong></p>
        <p><?php echo $produto['codInterno']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Fournisseur</strong></p>
        <p><?php echo "n°".$produto['fornecedor']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Prix d'achat</strong></p>
        <p><?php echo $produto['custo']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Prix de vente</strong></p>
        <p><?php echo $produto['venda']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Quantité</strong></p>
        <p><?php echo $produto['quantidade']?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Catégorie</strong></p>
        <p><?php echo $produto['principio']?></p>
    </div>

</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=produtos" class="btn btn-primary">Fermer</a>
        <a href="?pg=editar-produto&id=<?php echo $produto['id']?>" class="btn btn-dark">Editer</a>
    </div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

