
<?php
include ('classes/Mysql.php');
$id=$_GET['id'];
    $sql= $db->prepare("SELECT * FROM `tb_caisse` where id2=$id");
    $sql->execute();
    $usuario= $sql->fetch();



?>



  <h3 class="page-header">Caissier n°<?php echo $usuario['id2'];?></h3>
<?php
?>
<br>
<br>
<div class="visualizar-caisse">
<div class="row">
    <div class="col-md-3">
      <p><strong>Nome</strong></p>
  	  <p><?php echo $usuario['nome2'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Cargo</strong></p>
  	  <p><?php echo $usuario['cargo2'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Usuario</strong></p>
  	  <p><?php echo $usuario['usuario2'];?></p>
    </div>

    <div class="col-md-3">
      <p><strong>Senha</strong></p>
  	  <p><?php echo $usuario['senha2'];?></p>
    </div>

 </div>
</div>
<br>
<br>
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="?pg=caisse" class="btn btn-primary">Fechar</a>
	 <a href="?pg=editar-caisse&id=<?php echo $usuario['id2']?>" class="btn btn-dark">Editar</a>
   </div>
 </div>


