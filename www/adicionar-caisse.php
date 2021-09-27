
<?php
include ('classes/Mysql.php');
?>

<div class="adicionar-caisse">
    <h3 class="page-header">Adicionar usuario</h3>
    <fieldset>
    <form class="form-cliente" method="post" enctype="multipart/form-data">


        <?php
        if(isset($_POST['acao'])){
         $nome=$_POST['nome'];
         $cargo=$_POST['cargo'];
        $usuario=$_POST['usuario'];
        $senha=$_POST['senha'];

            $sql = $db->prepare("INSERT INTO tb_caisse (nome2, usuario2, senha2, cargo2) VALUES (:nome2 ,:usuario2 ,:senha2 ,:cargo2)");
            $sql->bindValue(':nome2', $nome);
            $sql->bindValue(':usuario2',$usuario);
            $sql->bindValue(':senha2',$senha);
            $sql->bindValue(':cargo2',$cargo);
            $sql->execute();
         }
?>



<div class="form-caisse">
<div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Cargo</label>
                <input type="text" required type="text" class="form-control" name="cargo" placeholder="Digite o Cargo">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text"  required type="text" class="form-control" name="usuario" placeholder="Digite o Usuario">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Senha</label>
                <input type="password"  required type= "password" class="form-control" name="senha" placeholder="Digite a Senha">
            </div>

        </div>
</div>



        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Salvar</button>
                <a href="?pg=caisse" class="btn btn-default">Cancelar</a>
            </div>
        </div>

    </form>
    </fieldset>
</div>

