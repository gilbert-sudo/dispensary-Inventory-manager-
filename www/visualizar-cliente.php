<?php

include('classes/Mysql.php');
if (isset($_GET['deletar'])) {
  $id = (int)$_GET['deletar'];

  $db->exec("DELETE FROM `tb_clientes` WHERE id = $id");
}


?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = $db->prepare("SELECT * FROM `tb_clientes` where id=$id");
  $sql->execute();
  $cliente = $sql->fetch();
}


?>



<h3 class="page-header">Client n°<?php echo $cliente['id'] ?></h3>

<div class="row">
  <div class="col-md-4">
    <p><strong>Nom</strong></p>
    <p><?php echo $cliente['nome'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Cpf</strong></p>
    <p><?php echo $cliente['cpf'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Date de naissance</strong></p>
    <p><?php echo $cliente['dataNascimento'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Adresse</strong></p>
    <p><?php echo $cliente['endereco'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Numéro</strong></p>
    <p><?php echo $cliente['numero'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Quartier</strong></p>
    <p><?php echo $cliente['bairro'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Téléphone</strong></p>
    <p><?php echo $cliente['telefone'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Téléphone portable</strong></p>
    <p><?php echo $cliente['celular'] ?></p>
  </div>

  <div class="col-md-4">
    <p><strong>Email</strong></p>
    <p><?php echo $cliente['email'] ?></p>
  </div>

</div>

<hr />
<div id="actions" class="row">
  <div class="col-md-12">
    <a href="?pg=cliente" class="btn btn-danger">Fermer</a>
    <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
      <a href="?pg=editar-cliente&id=<?php echo $cliente['id'] ?>" class="btn btn-dark">Editer</a>
    <?php endif; ?>
  </div>
</div>
<br>
<script>
  $modal = ('#delete-modal').modal('show');
</script>