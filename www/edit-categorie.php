<?php
include('classes/Mysql.php');

$id = $_GET['id'];
$sql = $db->prepare("SELECT * FROM `tb_categorie` where id=$id");
$sql->execute();
$produto = $sql->fetch();
?>
<div class="cadastro-cliente">
    <h3 class="page-header">Editer ce catégorie</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=categorie&id=<?= $id ?>">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom</label>
                <input required type="text" class="form-control" name="name" value="<?php echo $produto['nom']; ?>">
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Sauvegarder</button>
                <a href="?pg=categorie" class="btn btn-default">Annuler</a>
            </div>
        </div>

    </form>
</div>