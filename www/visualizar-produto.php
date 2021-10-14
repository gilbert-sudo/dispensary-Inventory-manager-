<?php
include ('classes/Mysql.php');
$id=$_GET['id'];

if (isset($_POST['ajouter'])) {
    $new_quant = $_POST['quantity'];
    $old_quant = $_GET['old_quant'];
    $quant = $new_quant+$old_quant;
    $update_stock = $db->prepare("UPDATE tb_produtos SET quantidade = ? WHERE id = $id");
    $update_stock->execute(array($quant));
}
$sql= $db->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto= $sql->fetch();
?>



<h3 class="page-header">Produit n° <?php echo $produto['codInterno']?></h3>

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
    <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
    <div class="col-md-4">
        <p><strong>Prix d'achat</strong></p>
        <p><?php echo $produto['custo']?></p>
    </div>
    <?php endif; ?>

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
        <a href="?pg=produtos" class="btn btn-danger">Fermer</a>
        <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
        <a href="?pg=editar-produto&id=<?php echo $produto['id']?>" class="btn btn-dark">Editer</a>
        <?php endif; ?>
        <a href="?pg=quick-add&id=<?php echo $produto['id']?>" class="btn btn-primary">En ajouter</a>
    </div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

