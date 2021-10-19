<div class="cadastro-cliente">
    <h3 class="page-header">Ajout rapide de stock:</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/pro-add.php">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Importer le programme: le fichier&nbsp;<span style="font-size: 30px;">"Produits.db"</span></label>
            </div>
        </div>


        <div class="row">


            <div class="form-group col-md-7">
                <input type="file" required class="btn btn-primary" name="file1">
            </div>
            <div class="form-group col-md-3">
                <button class="btn btn-primary" type="submit" name="import_btn">Importer</button>
            </div>


        </div>



</div>
<div class="row" style="margin-left: 100px;">
    <?php showErr(); ?>
</div>
<hr>
<div class="row" style="margin-left: 100px;">
    <div class="col-md-12">
        <?php if (isset($_GET['err']) && $_GET['typeMess'] == "success" && !isset($_GET['exec'])) : ?>
            <a href="php/exec-pro-add.php" class="btn btn-primary">Exécuter le programme</a>
        <?php endif; ?>
        <?php if (isset($_GET['err']) && $_GET['typeMess'] == "success" && isset($_GET['exec'])) : ?>
            <a href="?pg=produtos" class="btn btn-primary">Voir le stock</a>
        <?php endif; ?>
        <a href="?pg=extras" class="btn btn-danger">Annuler</a>
    </div>
</div>

</form>
</div>