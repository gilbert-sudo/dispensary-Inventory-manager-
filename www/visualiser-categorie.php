<?php

include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_categorie` WHERE id = $id" );
}


?>

<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql= $db->prepare("SELECT * FROM `tb_categorie` where id=$id");
    $sql->execute();
    $fornecedor= $sql->fetch();
}


?>

<div class="visualizar-fornecedor">

<h3 class="page-header">Catégorie #<?= $fornecedor['id'];?></h3>

<div class="row">
    <?php if (!empty($fornecedor['nom'])) :?>
    <div class="col-md-4">
        <p><strong>Nom</strong></p>
        <p><?php echo $fornecedor['nom'];?></p>
    </div>
    <?php endif;?>
    
</div>

<hr />
<div id="actions" class="row">
    <div class="col-md-12">
        <a href="?pg=fornecedores" class="btn btn-primary">Fermer</a>
        <a href="?pg=editar-fornecedor&id=<?php echo $fornecedor['id']?> " class="btn btn-dark">Editer</a>
    </div>
</div>
</div>
<br>
<script>
    $modal=('#delete-modal').modal('show');
</script>

