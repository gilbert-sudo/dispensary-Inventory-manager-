<?php
include('classes/Mysql.php');
?>

<div class="cadastro-cliente">
    <h3 class="page-header">Ajouter un fournisseur</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/add-provider.php">
        <div class=" row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" type="text" required class="form-control" name="nome" placeholder="Entrez un nom">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Cnpj</label>
            <input type="number" type="number" class="form-control" name="cpf" placeholder="Entrez le cpf">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Immatriculation d'État</label>
            <input type="number" type="number" class="form-control" name="inscricao" placeholder="Entrer date de naissance">
        </div>
</div>

<div class="row">
    <div class="form-group col-md-5">
        <label for="exampleInputEmail1">Adresse</label>
        <input type="text" type="text" class="form-control" name="endereco" placeholder="Entrez l'adresse">
    </div>
    <div class="form-group col-sm-2">
        <label for="exampleInputEmail1">Numéro</label>
        <input type="number" type="number" class="form-control" name="numero" placeholder="Entrez un numéro résidentiel">
    </div>
    <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Quartier</label>
        <input type="text" type="text" class="form-control" name="bairro" placeholder="Entrez un quartier">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label>Ville</label>
        <input type="text " type="text" class="form-control" name="cidade" placeholder="Entrez une ville">
    </div>

    <div class="form-group col-md-4">
        <label>Cep</label>
        <input type="text " type="text" class="form-control" name="cep" placeholder="Entrez le cep">
    </div>
    <div class="form-group col-md-2">
        <label>UF</label>
        <input type="text" type="text" class="form-control" name="uf" placeholder="Entrez l'Uf">
    </div>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Téléphone</label>
        <input type="tel" type="tel" class="form-control" name="telefone" placeholder="Entrez le téléphone">
    </div>


    <div class="form-group col-md-5">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" type="tel" class="form-control" name="email" placeholder="Entrez un email">
    </div>

</div>
<hr>
<?php
if (isset($_GET['err'])) {
    if (($_GET['err']) == 1) {
        echo '<button name="error" class="btn btn-success" onclick="return false;">Ce fournisseur a été bien ajouté ✅</button>';
    } 
}
?>
<hr>

<div class="row">
    <div class="col-md-12">
        <button type="submit" name="acao" class="btn btn-primary">Enregistrer</button>
        <a href="?pg=fornecedores" class="btn btn-default">Annuler</a>
    </div>
</div>

</form>

</div>