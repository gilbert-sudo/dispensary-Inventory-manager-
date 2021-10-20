<div class="cadastro-cliente">
    <h3 class="page-header">BACK-UP:</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/import-backup.php">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Importer la base de donnée: le fichier&nbsp;<span style="font-size: 30px;">"Database.db"</span></label>
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
            <a href="?pg=backup" class="btn btn-primary">Ok, Merci!🙂</a>
        <?php endif; ?>
        <?php if (!isset($_GET['err'])) : ?>
            <a href="?pg=backup" class="btn btn-danger">Annuler</a>
        <?php endif; ?>
        <?php if (isset($_GET['err']) && $_GET['typeMess'] == "danger" && !isset($_GET['exec'])) : ?>
            <a href="?pg=backup" class="btn btn-danger">Annuler</a>
        <?php endif; ?>

    </div>
</div>

</form>

</div>