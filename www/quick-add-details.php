<?php
include('classes/Mysql.php');
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $db->exec("DELETE FROM `tb_sortie` WHERE id = $id");
}
if (isset($_GET['deleteAll'])) {
    $db->exec("DELETE FROM `tb_sortie`");
}

?>
<div id="list" class="row">

    <div class="card table-responsive col-md-12">
        <div class="card-header ">
            <div class="form-year" align="right">
                <!-- <input type="year"> -->
                <a onclick="return window.confirm('Êtes-vous sûr de vouloir tout éffacer ?');" class="btn btn-danger" href="?pg=quick-add-details&deleteAll=1" style="background-color: white; margin-top:10px; margin-left:20px;">Tout éffacer</a>
            </div>
            <h4 class="card-title">Journal d'ajout 📃</h4>
            <p class="card-category">Les ajout rapide fait par les caissier.</p>
        </div>
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>code produit</th>
                    <th>nom</th>
                    <th>Quantité</th>
                    <th>caissier</th>
                    <th>date</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $db->prepare("SELECT * FROM `tb_sortie`");
                $sql->execute();
                $quick_add = $sql->fetchAll();
                $count = 0;
                ?>
                <?php foreach ($quick_add as $value) : ?>
                    <tr>
                        <td><?= ++$count; ?></td>
                        <td><?= $value['code']; ?></td>
                        <td><?= $value['nom']; ?></td>
                        <td><?= $value['quant']; ?></td>
                        <td><?= $value['ajouteur']; ?></td>
                        <td><?= $value['date']; ?></td>
                        <td>
                            <a onclick="return window.confirm('Êtes-vous sûr de vouloir l\'éffacer ?');" class="btn btn-danger btn-xs" href="?pg=quick-add-details&delete=<?= $value['id']; ?>" style="background-color: white;">Effacer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>