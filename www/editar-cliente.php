<?php
include ('classes/Mysql.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql= $db->prepare("SELECT * FROM `tb_clientes` where id=$id");
    $sql->execute();
    $cliente= $sql->fetch();
}

?>



<div class="cadastro-cliente">
<h3 class="page-header">Editer un client</h3>
<form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=cliente&id=<?= $id ?>">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nom</label>
            <input type="text" required type="text" class="form-control" name="nome" value="<?php echo $cliente['nome']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Date de naissance</label>
            <input type="date"  type="date" class="form-control" name="dataNascimento"  value="<?php echo $cliente['dataNascimento']?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-2">
            <label for="exampleInputEmail1">Numéro</label>
            <input type="text" required type="text" class="form-control" name="numero" value="<?php echo $cliente['numero']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Adresse</label>
            <input type="text" type="text" class="form-control" name="bairro"  value="<?php echo $cliente['bairro']?>">
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Télephone</label>
            <input type="tel" type="tel" class="form-control" name="telefone" value="<?php echo $cliente['telefone']?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" type= "tel" class="form-control" name="email"  value="<?php echo $cliente['email']?>">
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