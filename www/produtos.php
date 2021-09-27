<?php
include('classes/Mysql.php');
if (isset($_GET['deletar'])) {
    $id = (int)$_GET['deletar'];

    $db->exec("DELETE FROM `tb_produtos` WHERE id = $id");
}

if (isset($_POST['acao'])) {
    $id = $_GET['id'];
    $descricao = $_POST['descricao'];
    $codInterno = $_POST['codInterno'];
    $codBarras = ' ';
    $fornecedor = $_POST['fornecedor'];
    $custo = $_POST['custo'];
    $venda = $_POST['venda'];
    $quantidade = $_POST['quantidade'];
    $principio = $_POST['principio'];

    $sql = $db->prepare("UPDATE tb_produtos SET descricao = :descricao, codInterno = :codInterno, codBarras = :codBarras, fornecedor = :fornecedor, custo = :custo, venda = :venda , principio = :principio, quantidade = :quantidade WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':codInterno', $codInterno);
    $sql->bindValue(':codBarras', $codBarras);
    $sql->bindValue(':fornecedor', $fornecedor);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':venda', $venda);
    $sql->bindValue(':principio', $principio);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->execute();
}
?>

<?php

$sql = $db->prepare("SELECT * FROM `tb_produtos`");
$sql->execute();
$produtos = $sql->fetchAll();
?>


<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Produits</h2>
        </div>
        <div class="col-sm-6">

        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-produto"><i class="fa fa-plus"></i> Ajouter un produit</a>
            <a class="btn btn-default" href="?pg=produtos"><i class="fa fa-refresh"></i> Actualiser</a>
        </div>
    </div>


    <hr />
    <div id="list" class="row">

        <div class="table-responsive col-md-12">
            <table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th class="actions">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <?php foreach ($produtos as $value) : ?>
                            <td><?php echo $value['codInterno'] ?></td>
                            <td><?php echo $value['descricao'] ?></td>
                            <td><?php echo $value['quantidade'] ?></td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="?pg=visualizar-produto&id=<?php echo $value['id']; ?>">Regarder</a>
                                <a class="btn btn-warning btn-xs" href="?pg=editar-produto&id=<?php echo $value['id']; ?> ">'Editer</a>
                                <a onclick="return window.confirm('Voulez-vous vraiment supprimer ce produit ?');" class="btn btn-danger btn-xs" href="?pg=produtos&deletar=<?php echo $value['id']; ?>">Effacer</a>
                            </td>
                    </tr>
                <?php
                        endforeach;
                ?>
                </tbody>
            </table>
        </div>

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