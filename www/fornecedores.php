<?php
include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_fornecedores` WHERE id = $id" );
}
?>
<?php
$sql=$db->prepare("SELECT * FROM `tb_fornecedores`");
$sql->execute();
$fornecedores= $sql->fetchAll();
 ?>


<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Fournisseurs</h2>
        </div>
        <div class="col-sm-5">

        </div>
        <div class="col-sm-5 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-fornecedor"><i class="fa fa-plus"></i> Ajouter un Fournisseur</a>
            <a class="btn btn-default" href="?pg=fornecedor"><i class="fa fa-refresh"></i> Actualiser</a>
        </div>
    </div>


 <hr />
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Cnpf</th>
                    <th>cidade</th>
                    <th class="actions">actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
					<?php foreach ($fornecedores as $value) : ?>
                    <td><?php echo $value['id']?></td>
                    <td><?php echo $value['nome']?></td>
                    <td><?php echo $value['cnpj']?></td>
                    <td><?php echo $value['cidade']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs" href="?pg=visualizar-fornecedor&id=<?php echo $value['id']; ?>">Regarder</a>
                        <a class="btn btn-danger btn-xs"  href="?pg=fornecedores&deletar=<?php echo $value['id']; ?>">Effacer</a>
                    </td>
                </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

    <div id="bottom" class="row">
        <div class="col-md-12">
            <ul class="pagination">
                <li class="disabled"><a>&lt; Précedant</a></li>
                <li class="disabled"><a>1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next"><a href="#" rel="next">Suivant &gt;</a></li>
            </ul><!-- /.pagination -->
        </div>
    </div> <!-- /#bottom -->
</div>
