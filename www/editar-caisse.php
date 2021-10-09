<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= $db->prepare("SELECT * FROM `tb_caisse` where id2=$id");
$sql->execute();
$usuario= $sql->fetch();

            ?>





<div class="adicionar-usuario">
    <h3 class="page-header">Editer un caissier</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=caisse&id=<?=$id?>">


     


            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" required type="text" class="form-control" name="nome2" placeholder="Digite o Nome" value="<?php echo $usuario['nome2'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Fonction</label>
                        <input type="text" required type="text" class="form-control" name="cargo2" placeholder="Digite o Cargo" value="<?php echo $usuario['cargo2'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom d'Utilisateur</label>
                        <input type="text"  required type="text" class="form-control" name="usuario2" placeholder="Digite o Usuario" value="<?php echo $usuario['usuario2'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Mots de passe</label>
                        <input type="text"  required type= "text" class="form-control" name="senha2" placeholder="Digite a Senha" value="<?php echo $usuario['senha2'];?>">
                    </div>

                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="acao" class="btn btn-primary">Enregistrer</button>
                    <a href="?pg=caisse" class="btn btn-default">Annuler</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>

