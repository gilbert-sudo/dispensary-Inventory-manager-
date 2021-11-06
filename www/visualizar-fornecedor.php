<?php

include('classes/Mysql.php');
if (isset($_GET['deletar'])) {
    $id = (int)$_GET['deletar'];

    $db->exec("DELETE FROM `tb_fornecedores` WHERE id = $id");
}


?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $db->prepare("SELECT * FROM `tb_fornecedores` where id=$id");
    $sql->execute();
    $fornecedor = $sql->fetch();
}


?>

<div class="visualizar-fornecedor">

    <h3 class="page-header">Fournisseur #<?= $fornecedor['id']; ?></h3>

    <div class="row">
        <?php if (!empty($fornecedor['nome'])) : ?>
            <div class="col-md-4">
                <p><strong>Nom</strong></p>
                <p><?php echo $fornecedor['nome']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['cnpj'])) : ?>
            <div class="col-md-4">
                <p><strong>Cnpj</strong></p>
                <p><?php echo $fornecedor['cnpj']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['inscricao'])) : ?>
            <div class="col-md-4">
                <p><strong>Immatriculation d'État</strong></p>
                <p><?php echo $fornecedor['inscricao']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['endereco'])) : ?>
            <div class="col-md-4">
                <p><strong>Adresse</strong></p>
                <p><?php echo $fornecedor['endereco']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['numero'])) : ?>
            <div class="col-md-4">
                <p><strong>Numéro</strong></p>
                <p><?php echo $fornecedor['numero']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['bairro'])) : ?>
            <div class="col-md-4">
                <p><strong>district</strong></p>
                <p><?php echo $fornecedor['bairro']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['cidade'])) : ?>
            <div class="col-md-4">
                <p><strong>Ville</strong></p>
                <p><?php echo $fornecedor['cidade']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['cep'])) : ?>
            <div class="col-md-4">
                <p><strong>Cep</strong></p>
                <p><?php echo $fornecedor['cep']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['uf'])) : ?>
            <div class="col-md-2">
                <p>
                    <strong>UF</strong>
                </p>
                <p><?php echo $fornecedor['uf']; ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['telefone'])) : ?>
            <div class="col-md-4">
                <p><strong>Téléphone</strong></p>
                <p><?php echo $fornecedor['telefone'] ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($fornecedor['email'])) : ?>
            <div class="col-md-4">
                <p><strong>Email</strong></p>
                <p><?php echo $fornecedor['email'] ?></p>
            </div>
        <?php endif; ?>

    </div>

    <hr />
    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="?pg=editar-fornecedor&id=<?php echo $fornecedor['id'] ?> " class="btn btn-primary">Editer</a>
            <a href="?pg=fornecedores" class="btn btn-danger">Retour</a>
        </div>
    </div>
</div>
<br>
<script>
    $modal = ('#delete-modal').modal('show');
</script>