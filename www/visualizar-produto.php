<?php
include('classes/Mysql.php');
$id = $_GET['id'];

if (isset($_POST['ajouter'])) {
    $new_quant = $_POST['quantity'];
    $old_quant = $_GET['old_quant'];
    $quant = $new_quant + $old_quant;
    $update_stock = $db->prepare("UPDATE tb_produtos SET quantidade = ? WHERE id = $id");
    $update_stock->execute(array($quant));
}

?>
<?php
include('classes/connect.php');
$db_2 = connect2('programmed-add.db');
if (isset($_POST['ajouter_pro'])) {
    $new_quant = $_POST['quantity'];
    $old_quant = $_GET['old_quant'];
    // ======================UPDATE MAIN-STOCK======================================
    $quant = $new_quant + $old_quant;
    $update_stock = $db->prepare("UPDATE tb_produtos SET quantidade = :quantidade, codBarras = :codBarras WHERE id = $id");
    $update_stock->bindValue(':quantidade', $quant);
    $update_stock->bindValue(':codBarras', 1);
    $update_stock->execute();
    // ======================END UPDATE MAIN-STOCK==================================
    // ======================UPDATE PROGRAMMED-ADD-STOCK============================
    $quant = $new_quant;
    $admin = $_SESSION['nome'];
    $program_stock = $db_2->prepare("INSERT INTO add_product VALUES (null,?,?,?,?)");
    $program_stock->execute(array($id, $quant, $admin, date('m/d/y')));
    // ======================END UPDATE PROGRAMMED-ADD-STOCK============================
}
$sql = $db->prepare("SELECT * FROM `tb_produtos` where id=$id");
$sql->execute();
$produto = $sql->fetch();

$sql_2 = $db_2->prepare("SELECT * FROM `add_product` where numero=$id");
$sql_2->execute();
$prod_pro = $sql_2->fetchAll();
$nbr_add = array_column($prod_pro, 'quantity');
$nbr_row = count($nbr_add);
?>



<h3 class="page-header">Produit n° <?php echo $produto['codInterno'] ?></h3>

<div class="row">
    <div class="col-md-4">
        <p><strong>Dscription</strong></p>
        <p><?php echo $produto['descricao'] ?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Code interne</strong></p>
        <p><?php echo $produto['codInterno'] ?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Fournisseur</strong></p>
        <p><?php echo "n°" . $produto['fornecedor'] ?></p>
    </div>
    <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
        <div class="col-md-4">
            <p><strong>Prix d'achat</strong></p>
            <p><?php echo $produto['custo'] ?></p>
        </div>
    <?php endif; ?>

    <div class="col-md-4">
        <p><strong>Prix de vente</strong></p>
        <p><?php echo $produto['venda'] ?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Quantité</strong></p>
        <p><?php echo $produto['quantidade'] ?></p>
    </div>

    <div class="col-md-4">
        <p><strong>Catégorie</strong></p>
        <p><?php echo $produto['principio'] ?></p>
    </div>
    <?php if ($nbr_row == 1) : ?>
        <div class="col-md-4" id="add-pro">
            <p><strong>Ajout programmé</strong></p>
            <p>Ajouter&nbsp;<big><strong><?php echo $nbr_add[0] ?></strong></big></p>
        </div>
    <?php endif; ?>
</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=produtos" class="btn btn-danger">Fermer</a>
        <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
            <a href="?pg=editar-produto&id=<?php echo $produto['id'] ?>" class="btn btn-dark">Editer</a>
        <?php endif; ?>
        <a href="?pg=quick-add&id=<?php echo $produto['id'] ?>" class="btn btn-primary">En ajouter</a>
        <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
            <?php if ($nbr_row == 0) : ?>
                <a href="?pg=programmed-add&id=<?php echo $produto['id'] ?>" class="btn btn-warning">Ajout programmé</a>
            <?php endif; ?>
            <?php if ($nbr_row == 1) : ?>
                <a href="php/cancel_programmed_add.php?quantity=<?= $nbr_add[0];?>&old_quant=<?= $produto['quantidade'];?>&delete=<?=$produto['id'];?>" class="btn btn-danger">Annuler l'ajout programmé</a>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<br>
<script>
    $modal = ('#delete-modal').modal('show');
</script>