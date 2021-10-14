<?php
include('classes/Mysql.php');
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = $db->prepare("SELECT * FROM `tb_fornecedores` where id=$id");
    $sql->execute();
    $fornecedor = $sql->fetch();
}
?>



<div class="cadastro-cliente">
    <h3 class="page-header">Editer un Fournisseur</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" required type="text" class="form-control" name="nome" value="<?php echo $fornecedor['nome']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">CNPJ</label>
                <input type="number" required type="number" class="form-control" name="cpf" placeholder="Digite o cnpf" value="<?php echo $fornecedor['cnpj']; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Numéro de matriculation</label>
                <input type="number" required type="number" class="form-control" name="inscricao" placeholder="Digite a Inscrição Estadual" value="<?php echo $fornecedor['inscricao']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Adresse</label>
                <input type="text" required type="text" class="form-control" name="endereco" placeholder="Digite o Endereco" value="<?php echo $fornecedor['endereco']; ?>">
            </div>
            <div class="form-group col-sm-2">
                <label for="exampleInputEmail1">Numero</label>
                <input type="number" required type="number" class="form-control" name="numero" placeholder="Digite o Numero da residencia" value="<?php echo $fornecedor['numero']; ?>">
            </div>

        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Ville</label>
                <input type="text " required type="text" class="form-control" name="cidade" placeholder="Digite a cidade" value="<?php echo $fornecedor['cidade']; ?>">
            </div>

            <div class="form-group col-md-4">
                <label>CEP</label>
                <input type="text " required type="text" class="form-control" name="cidade" placeholder="Digite o cep" value="<?php echo $fornecedor['cep']; ?>">
            </div>
            <div class="form-group col-md-2">
                <label>UF</label>
                <input type="text" required type="text" class="form-control" name="uf" placeholder="Digite o Uf" value="<?php echo $fornecedor['uf']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Téléphone</label>
                <input type="tel" required type="tel" class="form-control" name="telefone" placeholder="Digite o Telefone" value="<?php echo $fornecedor['telefone']; ?>">
            </div>


            <div class="form-group col-md-5">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" required type="tel" class="form-control" name="email" placeholder="Digite o valor" value="<?php echo $fornecedor['email']; ?>">
            </div>

        </div>


        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="?pg=fornecedores" class="btn btn-default">Annuler</a>
            </div>
        </div>

    </form>
</div>