<?php
include ('classes/Mysql.php');

$id=$_GET['id'];
$sql= $db->prepare("SELECT * FROM `tb_profil` where id=$id");
$sql->execute();
$usuario= $sql->fetch();

?>

<div class="adicionar-usuario">
    <h3 class="page-header">Editer votre profile</h3>
    <fieldset>
        <form class="form-cliente" method="post" enctype="multipart/form-data" action="?pg=profil&id=<?php echo $usuario['id'];?>">

            <div class="form-usuario">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Nom</label>
                        <input type="text" required type="text" class="form-control" name="name" placeholder="Digite o Nome" value="<?php echo $usuario['name'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">CNPJ</label>
                        <input type="text" required type="text" class="form-control" name="cnpj" placeholder="Digite o Cargo" value="<?php echo $usuario['cnpj'];?>">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Adresse</label>
                        <input type="text"  required type="text" class="form-control" name="Adresse" placeholder="Digite o Usuario" value="<?php echo $usuario['Adresse'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Téléphone</label>
                        <input type="text"  required type= "password" class="form-control" name="telephone" placeholder="Digite a Senha" value="<?php echo $usuario['telephone'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">IE</label>
                        <input type="text"  required type="text" class="form-control" name="ie" placeholder="Digite o Usuario" value="<?php echo $usuario['ie'];?>">
                    </div>
                </div>

            </div>



            <hr />

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="enregistrer">Sauvegarder</button>
                    <a href="?pg=profil" class="btn btn-default">Annuler</a>
                </div>
            </div>

        </form>
    </fieldset>
</div>

