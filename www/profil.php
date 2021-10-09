
<?php
include ('classes/Mysql.php');
   

    if(isset($_POST['enregistrer'])){
      $id = $_GET['id'];
      $name = $_POST['name'];
      $cnpj = $_POST['cnpj'];
      $ie = $_POST['ie'];
      $adresse = $_POST['Adresse'];
      $telephone = $_POST['telephone'];

      //  $sql = MySql::conectar()->prepare("INSERT INTO `tb_usuarios`  VALUES (null,?,?,?,?)");
      // $ql->execute(array($nome,$cargo,$usuario,$senha));
      $sql = ("UPDATE tb_profil SET name = :name, cnpj = :cnpj, Adresse = :adresse, telephone = :telephone, ie = :ie WHERE id = :id");
      $sql = $db->prepare($sql);
      $sql->bindValue(':name', $name);
      $sql->bindValue(':cnpj', $cnpj);
      $sql->bindValue(':adresse', $adresse);
      $sql->bindValue(':telephone', $telephone);
      $sql->bindValue(':ie', $ie);
      $sql->bindValue(':id', $id);
      $sql->execute();
  }

  $sql= $db->prepare("SELECT * FROM `tb_profil`");
  $sql->execute();
  $usuario= $sql->fetch();
?>
  <h3 class="page-header">Votre profil:</h3>
<?php
?>
<br>
<br>
<div class="visualizar-usuario">
<div class="row">
    <div class="col-md-3">
      <p><strong>Nom</strong></p>
  	  <p><?php echo $usuario['name'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>CNPJ</strong></p>
  	  <p><?php echo $usuario['cnpj'];?></p>
    </div>

	<div class="col-md-3">
      <p><strong>Adresse</strong></p>
  	  <p><?php echo $usuario['Adresse'];?></p>
    </div>

    <div class="col-md-3">
      <p><strong>Téléphone</strong></p>
  	  <p><?php echo $usuario['telephone'];?></p>
    </div>

    <div class="col-md-3">
      <p><strong>IE</strong></p>
  	  <p><?php echo $usuario['ie'];?></p>
    </div>

 </div>
</div>
<br>
<br>
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="?pg=profil" class="btn btn-primary">Actualiser</a>
	 <a href="?pg=edit-profil&id=<?php echo $usuario['id']?>" class="btn btn-dark">Editer</a>
   </div>
 </div>


