<?php
include('classes/Mysql.php');
if (isset($_GET['deletar'])) {
    $id = (int)$_GET['deletar'];

    $db->exec("DELETE FROM `tb_categorie` WHERE id = $id");
}
if (isset($_POST['acao'])) {
    $id = $_GET['id'];
    $nom = $_POST['name'];

    $sql = $db->prepare("UPDATE tb_categorie SET nom = :nom WHERE id = :id");
    $sql->bindValue(':nom', $nom);
    $sql->bindValue(':id', $id);
    $sql->execute();
}
?>
<?php
$sql = $db->prepare("SELECT * FROM `tb_categorie`");
$sql->execute();
$fornecedores = $sql->fetchAll();
?>


<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Catégories</h2>
        </div>
        <div class="col-sm-5">

        </div>
        <div class="col-sm-5 btn-lista">
            <a class="btn btn-primary" href="?pg=add-categorie"><i class="fa fa-plus"></i> Ajouter un catégorie </a>
            <a class="btn btn-default" href="?pg=categorie"><i class="fa fa-refresh"></i> Actualiser</a>
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
                        <th></th>
                        <th></th>
                        <th class="actions">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($fornecedores as $value) : ?>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['nom'] ?></td>
                            <td> </td>
                            <td> </td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="?pg=visualiser-categorie&id=<?php echo $value['id']; ?>">Regarder</a>
                                <a class="btn btn-warning btn-xs" href="?pg=edit-categorie&id=<?php echo $value['id']; ?> ">Editer</a>
                                <a class="btn btn-danger btn-xs" href="?pg=categorie&deletar=<?php echo $value['id']; ?>">Effacer</a>
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