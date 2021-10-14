<div class="adicionar-caisse">
    <h3 class="page-header">Ajouter un Caissier</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/add_caisse.php">

            <div class="form-caisse" style="margin-left: 50px;">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" required type="text" class="form-control" name="nome" placeholder="Entrez un nom">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Fonction</label>
                        <input type="text" required type="text" class="form-control" name="cargo" placeholder="Un fonction">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom d'utilisateur</label>
                        <input type="text" required type="text" class="form-control" name="usuario" placeholder="Entrez un nom d'utilisateur">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Mots de passe</label>
                        <input type="text" required type="text" class="form-control" name="senha" placeholder="Entrez un mot de passe.">
                    </div>

                </div>
            </div>
            <hr />

            <?php
            if (isset($_GET['err'])) {
                if (($_GET['err']) == 1) {
                    if (isset($_GET['typeMess']) && isset($_GET['errMess'])) {
                        $TypeMess = $_GET['typeMess'];
                        $errMess = $_GET['errMess'];
                        echo '<button name="error" class="btn btn-' . $TypeMess . '" onclick="return false;"> ' . $errMess . '</button>';
                    }
                }
            }
            ?>
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="acao" class="btn btn-primary">Enregistrer</button>
                    <a href="?pg=caisse" class="btn btn-danger">Annuler</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>