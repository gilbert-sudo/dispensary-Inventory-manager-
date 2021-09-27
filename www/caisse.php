<?php

include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_usuarios` WHERE id = $id2" );
}
if(isset($_POST['acao'])){
                $id = $_GET['id'];
                $nome = $_POST['nome2'];
                $cargo = $_POST['cargo2'];
                $usuario = $_POST['usuario2'];
                $senha = $_POST['senha2'];

                //  $sql = MySql::conectar()->prepare("INSERT INTO `tb_usuarios`  VALUES (null,?,?,?,?)");
                // $ql->execute(array($nome,$cargo,$usuario,$senha));
                $sql = ("UPDATE tb_caisse SET nome2 = :nome2, cargo2 = :cargo2, usuario2 = :usuario2, senha2 = :senha2 WHERE id2 = :id");
                $sql = $db->prepare($sql);
                $sql->bindValue(':nome2', $nome);
                $sql->bindValue(':cargo2', $cargo);
                $sql->bindValue(':usuario2', $usuario);
                $sql->bindValue(':senha2', $senha);
                $sql->bindValue(':id', $id);
                $sql->execute();
            }

?>

<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Caisse</h2>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-caisse"><i class="fa fa-plus"></i> Nouvel caisse</a>
            <a class="btn btn-default" href="?pg=caisse"><i class="fa fa-refresh"></i> Actualiser</a>
        </div>
    </div>


    <hr/>
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <?php


                $sql = $db->prepare("SELECT * FROM `tb_caisse`");
                $sql->execute();
                $usuarios= $sql->fetchAll();
?>
               

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Bureau</th>
                    <th>Caisse</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($usuarios as $value) : ?>
                    <td><?php echo $value['id2']?></td>
                    <td><?php echo $value['nome2']?></td>
                    <td><?php echo $value['cargo2']?></td>
                    <td><?php echo $value['usuario2']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-caissa&id=<?php echo $value['id2']?>">Regarder</a>
                        <a class="btn btn-warning btn-xs"
                           href="?pg=editar-caisse&id=<?php echo $value['id2'] ?> ">Éditer</a>
                        <a onclick="return window.confirm('Voulez-vous vraiment supprimer cet employé(e) ?');" class="btn btn-danger btn-xs" href= "?pg=caisse&deletar=<?php echo $value['id2']; ?>">Effacer</a>
                    </td>
                </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <div id="bottom" class="row">
        <div class="col-md-12">
            <ul class="pagination">
                <li class="disabled"><a>&lt; Précédent</a></li>
                <li class="disabled"><a>1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#" rel="next">Suivant &gt;</a></li>
            </ul><!-- /.pagination -->
        </div>
    </div> <!-- /#bottom -->
</div>