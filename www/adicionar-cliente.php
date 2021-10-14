<div class="cadastro-cliente">
    <h3 class="page-header">Ajouter un client</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/add-cliente.php">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nom <small style="color: red;">(Obligatoire)</small></label>
                <input type="text" required type="text" class="form-control" name="nome" placeholder="Entrer son Nom">
            </div>
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Date de naissance <small style="color: red;">(Obligatoire)</small></label>
                <input type="date" required type="date" class="form-control" name="dataNascimento" placeholder="Entrer date de naissance">
            </div>
        </div>

        <div class="row">

            <div class="form-group col-sm-4">
                <label for="exampleInputEmail1">Code interne <small style="color: red;">(Obligatoire)</small></label>
                <input type="text" required class="form-control" name="numero" placeholder="Entrez le numéro de la maison">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Quartier <small style="color: red;">(Obligatoire)</small> </label>
                <input type="text" required type="text" class="form-control" name="bairro" placeholder="Entrez le quartier">
            </div>
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Adresse</label>
                <input type="text" type="text" class="form-control" name="endereco" placeholder="Entrez l'adresse">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Téléphone 1</label>
                <input type="tel" type="tel" class="form-control" name="telefone" placeholder="Entrez un numéro">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" type="tel" class="form-control" name="email" placeholder="Entrez un email">
            </div>

        </div>

        <hr />
        <?php showErr(); ?>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Enregister</button>
                <a href="?pg=cliente" class="btn btn-danger">Annuler</a>
            </div>
        </div>

    </form>
</div>