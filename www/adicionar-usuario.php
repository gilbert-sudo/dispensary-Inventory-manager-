
<div class="adicionar-usuario">
    <h3 class="page-header">Ajout d'Utilisateur</h3>
    <fieldset>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/usuario.php"> 
<div class="form-usuario">
<div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Fonction</label>
                <input type="text" required type="text" class="form-control" name="cargo" placeholder="Digite o Cargo">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nom d'Utilisateur</label>
                <input type="text"  required type="text" class="form-control" name="usuario" placeholder="Digite o Usuario">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Mot de passe</label>
                <input type="text"  required type= "password" class="form-control" name="senha" placeholder="Digite a Senha">
            </div>

        </div>
</div>



        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Sauvegarder</button>
                <a href="?pg=usuario" class="btn btn-default">Annuler</a>
            </div>
        </div>

    </form>
    </fieldset>
</div>

