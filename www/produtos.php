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
    $benef = $venda - $custo;

    $sql = $db->prepare("UPDATE tb_produtos SET descricao = :descricao, codInterno = :codInterno, codBarras = :codBarras, fornecedor = :fornecedor, custo = :custo, venda = :venda , principio = :principio, quantidade = :quantidade, benefice = :benefice WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':codInterno', $codInterno);
    $sql->bindValue(':codBarras', $codBarras);
    $sql->bindValue(':fornecedor', $fornecedor);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':venda', $venda);
    $sql->bindValue(':principio', $principio);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->bindValue(':benefice', $benef);
    $sql->execute();
}
?>

<?php
// pagination
$numRows = 0;
$itemsPerPage = 100;
$totalItemReq = $db->query('SELECT id FROM tb_produtos');
while ($row = $totalItemReq->fetch(SQLITE3_ASSOC)) {
    ++$numRows;
}
$totalItem = $numRows;
$totalPages = ceil($totalItem / $itemsPerPage) + 1;
if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $totalItem) {
    $_GET['page'] = intval($_GET['page']);
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

$begin = ($currentPage - 1) * $itemsPerPage;
//end pagination

$sql = $db->prepare("SELECT * FROM `tb_produtos` LIMIT $begin,$itemsPerPage");
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
                                <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
                                    <a class="btn btn-warning btn-xs" href="?pg=editar-produto&id=<?php echo $value['id']; ?> ">Editer</a>
                                    <a onclick="return window.confirm('Voulez-vous vraiment supprimer ce produit ?');" class="btn btn-danger btn-xs" href="?pg=produtos&deletar=<?php echo $value['id']; ?>">Effacer</a>
                                <?php endif; ?>
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
                    <?php if ($currentPage != 1) {
                        $prev = $currentPage - 1;
                        echo '<li class="prev"><a href="?pg=produtos&page=' . ($prev) . '" rel="next">&lt; Précedant</a></li>';
                    } else {
                        echo '<li><a href="#">&lt; Précedant</a></li>';
                    }
                    ?>
                    <?php for ($i = 1; $i < $totalPages; $i++) {
                        if ($i == $currentPage) {
                            echo '<li><a  style="background-color: #75aca8; color:white;" href="#">' . $i . '</a></li>';
                        } else {
                            echo '<li><a href="?pg=produtos&page=' . $i . '">' . $i . '</a></li>';
                        }
                    } ?>
                    <?php if ($currentPage < ($totalPages - 1)) {
                        echo '<li class="next"><a href="?pg=produtos&page=' . (++$currentPage) . '" rel="next">Suivant &gt;</a></li>';
                    } else {
                        echo '<li class="next"><a href="#" rel="next">Suivant &gt;</a></li>';
                    }
                    ?>

                </ul><!-- /.pagination -->
            </div>
        </div> <!-- /#bottom -->
    </div>