<div class="cadastro-cliente">
    <h3 class="page-header">BACK-UP:</h3>

    


    <div class="row">


        <div class="form-group col-md-2">
            <a href="?pg=import-backup" class="btn btn-success">Importer</a>
        </div>
        <div class="form-group col-md-2">
            <a href="?pg=export-backup" class="btn btn-primary">Exporter</a>
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
            <a href="php/exec-pro-add.php" class="btn btn-primary">Lancer le back-up</a>
        <?php endif; ?>
        <?php if (isset($_GET['err']) && $_GET['typeMess'] == "success" && isset($_GET['exec'])) : ?>
            <a href="?pg=produtos" class="btn btn-primary">Voir le stock</a>
        <?php endif; ?>
        <a href="?pg=extras" class="btn btn-danger">Annuler</a>
    </div>
</div>

</div>