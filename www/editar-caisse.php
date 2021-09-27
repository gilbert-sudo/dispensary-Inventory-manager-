<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= $db->prepare("SELECT * FROM `tb_caisse` where id2=$id");
$sql->execute();
$usuario= $sql->fetch();

            ?>





<div class="adicionar-usuario">
    <h3 class="page-header">Adicionar usuario</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=caisse&id=<?=$id?>">


     


            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" required type="text" class="form-control" name="nome2" placeholder="Digite o Nome" value="<?php echo $usuario['nome2'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Cargo</label>
                        <input type="text" required type="text" class="form-control" name="cargo2" placeholder="Digite o Cargo" value="<?php echo $usuario['cargo2'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text"  required type="text" class="form-control" name="usuario2" placeholder="Digite o Usuario" value="<?php echo $usuario['usuario2'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="text"  required type= "text" class="form-control" name="senha2" placeholder="Digite a Senha" value="<?php echo $usuario['senha2'];?>">
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

