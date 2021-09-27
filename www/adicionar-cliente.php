<?php
include ('classes/Mysql.php');
?>
<div class="cadastro-cliente">
<h3 class="page-header">Ajouter un client</h3>
<form class="form-cliente" method="post" enctype="multipart/form-data">

<?php

   if(isset($_POST['acao'])){
		$nome=$_POST['nome'];
		$cpf=$_POST['cpf'];
		$dataNascimento=$_POST['dataNascimento'];
		$endereco=$_POST['endereco'];
		$numero=$_POST['numero'];
		$bairro=$_POST['bairro'];
		$telefone=$_POST['telefone'];
		$celular=$_POST['celular'];
		$email=$_POST['email'];

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
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" required type="text" class="form-control" name="nome" placeholder="Entrer son Nom">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Cpf</label>
            <input type="number" required type="number" class="form-control" name="cpf" placeholder="Enter cpf">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Date de naissance</label>
            <input type="date" required type="date" class="form-control" name="dataNascimento" placeholder="Entrer date de naissance">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Adresse</label>
            <input type="text" required type="text" class="form-control" name="endereco" placeholder="Entrez l'adresse">
        </div>
        <div class="form-group col-sm-2">
            <label for="exampleInputEmail1">Numero</label>
            <input type="text" required class="form-control" name="numero" placeholder="Entrez le numéro de la maison">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Quartier</label>
            <input type="text" required type="text" class="form-control" name="bairro" placeholder="Entrez le quartier">
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Téléphone</label>
            <input type="tel"  required type="tel" class="form-control" name="telefone" placeholder="Entrez un numéro">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Téléphone portable</label>
            <input type="tel" class="form-control" name="celular" placeholder="Entrez un numéro">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Email</label>
            <input type="email"  required type= "tel" class="form-control" name="email" placeholder="Entrez un email">
        </div>

    </div>



    <hr />

    <div class="row">
        <div class="col-md-12">
            <button type="submit" name="acao" class="btn btn-primary">Enregister</button>
            <a href="?pg=cliente" class="btn btn-default">Annuler</a>
        </div>
    </div>

</form>
</div>