<?php
include('classes/Mysql.php');

?>
<div class="cadastro-cliente">
    <h3 class="page-header">Ajouter un client</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data">

        <?php

        if (isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $dataNascimento = $_POST['dataNascimento'];
            $bairro = $_POST['bairro'];
            $numero = $_POST['numero'];
            if (empty($_POST['cpf'])) {$cpf = 'indéfinie';} else {$cpf = $_POST['cpf'];}
            if (empty($_POST['endereco'])) {$endereco = 'indéfinie';} else {$endereco = $_POST['endereco'];}
            if (empty($_POST['telefone'])) {$telefone = 'indéfinie';} else {$telefone = $_POST['telefone'];}
            if (empty($_POST['celular'])) {$celular = 'indéfinie';} else {$celular = $_POST['celular'];}
            if (empty($_POST['email'])) {$email = 'indéfinie';} else {$email = $_POST['email'];}
            

            $sql = $db->prepare("INSERT INTO tb_clientes (cpf ,nome ,dataNascimento ,endereco ,numero ,bairro ,telefone ,celular ,email) VALUES (:cpf ,:nome ,:dataNascimento ,:endereco ,:numero ,:bairro ,:telefone ,:celular ,:email)");
            $sql->bindValue(':cpf', $cpf);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':dataNascimento', $dataNascimento);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':numero', $numero);
            $sql->bindValue(':bairro', $bairro);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':celular', $celular);
            $sql->bindValue(':email', $email);
            $sql->execute();
        }

        ?>

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

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Enregister</button>
                <a href="?pg=cliente" class="btn btn-danger">Annuler</a>
            </div>
        </div>

    </form>
</div>