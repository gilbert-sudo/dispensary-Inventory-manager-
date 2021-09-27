
<?php
include ('classes/Mysql.php');
$id=$_GET['id'];
    $sql= $db->prepare("SELECT * FROM `tb_usuarios` where id=$id");
    $sql->execute();
    $usuario= $sql->fetch();



?>



  <h3 class="page-header">Utilisateur n° <?php echo $usuario['id'];?></h3>
<?php
?>
<br>
<br>
<div class="visualizar-usuario">
<div class="row">
    <div class="col-md-3">
      <p><strong>Nom</strong></p>
  	  <p><?php echo $usuario['nome'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Fonction</strong></p>
  	  <p><?php echo $usuario['cargo'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Utilisateur</strong></p>
  	  <p><?php echo $usuario['usuario'];?></p>
    </div>

    <div class="col-md-3">
      <p><strong>Mot de passe</strong></p>
  	  <p><?php echo $usuario['senha'];?></p>
    </div>

 </div>
</div>
<br>
<br>
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="?pg=usuario" class="btn btn-primary">Actualiser</a>
	 <a href="?pg=editar-usuario&id=<?php echo $usuario['id']?>" class="btn btn-dark">Editer</a>
   </div>
 </div>


