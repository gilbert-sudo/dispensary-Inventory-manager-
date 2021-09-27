<?php

include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_usuarios` WHERE id = $id" );
}


?>

<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Utilisateurs</h2>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-usuario"><i class="fa fa-plus"></i> Nouvel utilisateur</a>
            <a class="btn btn-default" href="?pg=usuario"><i class="fa fa-refresh"></i> Actualiser</a>
        </div>
    </div>


    <hr/>
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <?php


                $sql = $db->prepare("SELECT * FROM `tb_usuarios`");
                $sql->execute();
                $usuarios= $sql->fetchAll();
?>
               

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Bureau</th>
                    <th>Utilisateur</th>
                    <th class="actions">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($usuarios as $value) : ?>
                    <td><?php echo $value['id']?></td>
                    <td><?php echo $value['nome']?></td>
                    <td><?php echo $value['cargo']?></td>
                    <td><?php echo $value['usuario']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-usuario&id=<?php echo $value['id']?>">Regarder</a>
                        <a class="btn btn-warning btn-xs"
                           href="?pg=editar-usuario&id=<?php echo $value['id'] ?> ">Éditer</a>
                        <a onclick="return window.confirm('Voulez-vous vraiment supprimer cet Utilisateur ?');" class="btn btn-danger btn-xs" href= "?pg=usuario&deletar=<?php echo $value['id']; ?>">Effacer</a>
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