<?php
include( 'classes/Mysql.php' );
?>
<div class="container-fluid">
    <div class="card" style="width: 600px;height: 520px;margin-left: 30px">

        <div style="margin-left: 100px;width: 500px;padding-left: 40px">
            <br/>
            <h3 style="margin-top: 15px">Ajouter un RAPPEL</h3>
            <fieldset>
                <form method="post" enctype="multipart/form-data">


                    <?php
                    if (isset( $_POST['acao'] )) {
                        $usuario = $_SESSION['id'];
                        $data = $_POST['data'];
                        $texto = $_POST['texto'];

                        $sql = $db ->prepare( "INSERT INTO tb_lembrete (texto, data, usuario)  VALUES (:texto, :data, :usuario)");
                        $sql->bindValue(':texto', $texto);
                        $sql->bindValue(':data', $data);
                        $sql->bindValue(':usuario', $usuario);
                        $sql->execute();


                    }
                    ?>


                    <div class="row">
                        <div class=" col-md-4" style="height: 100px;width: 250px">
                            <label for="exampleInputEmail1">Date du RAPPEL</label>
                            <input type="date" required type="text" class="form-control" name="data"
                                   placeholder="Entrer une date">
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-4">
                            <label for="exampleInputEmail1">Texto</label>
                            <label>
                                <textarea style="height: 200px; width: 300px; border-radius: 4px" name="texto"
                                          placeholder="Digite o lembrete"></textarea>
                            </label>
                        </div>
                    </div>
<br/>
        </div>
        <div class="row">
            <div class="col-md-12"style="margin-left: 60px">
                <button type="submit" name="acao" class="btn btn-primary">Enregister</button>
                <a href="?pg=extras" class="btn btn-default">Annuler</a>
            </div>
        </div>
    </div>
        </form>
        </fieldset>
    </div>
