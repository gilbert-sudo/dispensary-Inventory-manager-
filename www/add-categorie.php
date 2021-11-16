<?php
include('classes/Mysql.php');
?>

<div class="cadastro-cliente">
    <h3 class="page-header">Ajouter un Catégorie</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/add-categorie.php">
        <div class=" row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" type="text" required class="form-control" name="name" placeholder="Entrez un nom">
        </div>
</div>


<hr>
<?php
if (isset($_GET['err'])) {
    if (($_GET['err']) == 1) {
        echo '<button name="error" class="btn btn-success" onclick="return false;">Ce catégorie a été bien ajouté ✅</button>';
    } 
}
?>
<hr>

<div class="row">
    <div class="col-md-12">
        <button type="submit" name="acao" class="btn btn-primary">Enregistrer</button>
        <a href="?pg=categorie" class="btn btn-danger">Retour</a>
    </div>
</div>

</form>

</div>