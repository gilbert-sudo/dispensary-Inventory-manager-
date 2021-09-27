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
<h3 class="page-header">Editar Cliente</h3>
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

        $sql = $db->prepare("INSERT INTO `tb_clientes` VALUES (null,?,?,?,?,?,?,?,?,?)");
        $sql->execute(array($cpf,$nome,$dataNascimento,$endereco,$numero,$bairro,$telefone,$celular,$email));


}
    ?>



    <div class="row">
        <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" required type="text" class="form-control" name="nome" value="<?php echo $cliente['nome']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Cpf</label>
            <input type="number" required type="number" class="form-control" name="cpf"  value="<?php echo $cliente['cpf']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Data Nacimento</label>
            <input type="date" required type="date" class="form-control" name="dataNascimento"  value="<?php echo $cliente['dataNascimento']?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Endereco</label>
            <input type="text" required type="text" class="form-control" name="endereco"  value="<?php echo $cliente['endereco']?>">
        </div>
        <div class="form-group col-sm-2">
            <label for="exampleInputEmail1">Numero</label>
            <input type="text" required type="text" class="form-control" name="numero" value="<?php echo $cliente['numero']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Bairro</label>
            <input type="text" required type="text" class="form-control" name="bairro"  value="<?php echo $cliente['bairro']?>">
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Telefone</label>
            <input type="tel"  required type="tel" class="form-control" name="telefone" value="<?php echo $cliente['telefone']?>">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleInputEmail1">Celular</label>
            <input type="tel" class="form-control" name="celular"  value="<?php echo $cliente['celular']?>">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-5">
            <label for="exampleInputEmail1">Email</label>
            <input type="email"  required type= "tel" class="form-control" name="email"  value="<?php echo $cliente['email']?>">
        </div>

    </div>



    <hr />

    <div class="row">
        <div class="col-md-12">
            <button type="submit" name="acao" class="btn btn-primary">Atualizar</button>
            <a href="?pg=cliente" class="btn btn-default">Cancelar</a>
        </div>
    </div>

</form>
</div>