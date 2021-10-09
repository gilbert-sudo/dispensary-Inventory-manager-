<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= $db->prepare("SELECT * FROM `tb_usuarios` where id=$id");
$sql->execute();
$usuario= $sql->fetch();



?>



<div class="adicionar-usuario">
    <h3 class="page-header">Edition</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=usuario&id=<?=$id?>">

            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" required type="text" class="form-control" name="nome" placeholder="Digite o Nome" value="<?php echo $usuario['nome'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Fonction</label>
                        <input type="text" required type="text" class="form-control" name="cargo" placeholder="Digite o Cargo" value="<?php echo $usuario['cargo'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Utilisateur</label>
                        <input type="text"  required type="text" class="form-control" name="usuario" placeholder="Digite o Usuario" value="<?php echo $usuario['usuario'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Mot de passe</label>
                        <input type="text"  required type= "password" class="form-control" name="senha" placeholder="Digite a Senha" value="<?php echo $usuario['senha'];?>">
                    </div>

                </div>
            </div>



            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="enregistrer">Sauvegarder</button>
                    <a href="?pg=usuario" class="btn btn-default">Annuler</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>

