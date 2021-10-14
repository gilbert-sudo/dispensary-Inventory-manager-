<?php
include('classes/Mysql.php');
if (isset($_GET['deletar'])) {
    $id = (int)$_GET['deletar'];

    $db->exec("DELETE FROM `tb_clientes` WHERE id = $id");
}


if (isset($_POST['acao'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $cpf = 'non identifié';
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = 'non identifié';
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $telefone = $_POST['telefone'];
    $celular = 'non identifié';
    $email = $_POST['email'];

    $sql = ("UPDATE tb_clientes SET cpf = :cpf, nome = :nome, dataNascimento = :dataNascimento, endereco = :endereco, numero = :numero, bairro = :bairro, telefone = :telefone, celular = :celular, email = :email WHERE id = :id");
                $sql = $db->prepare($sql);
                $sql->bindValue(':cpf', $cpf);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':dataNascimento', $dataNascimento);
                $sql->bindValue(':endereco', $endereco);
                $sql->bindValue(':numero', $numero);
                $sql->bindValue(':bairro', $bairro);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':celular', $celular);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':id', $id);
                $sql->execute();
}
?>

<?php
$sql = $db->prepare("SELECT * FROM `tb_clientes`");
$sql->execute();
$clientes = $sql->fetchAll();

?>



<div class="lista-cliente">

    <div id="top" class="row">
        <div class="col-sm-2">
            <h2>Clients</h2>
        </div>
        <div class="col-sm-6">



        </div>
        <div class="col-sm-4 btn-lista">
            <a class="btn btn-primary" href="?pg=adicionar-cliente"><i class="fa fa-plus"></i> Nouveau client</a>
            <a class="btn btn-default" href="?pg=cliente"><i class="fa fa-refresh"></i> Actualiser</a>
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
                        <th>Cpf</th>
                        <th>Quartier</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($clientes as $value) : ?>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['nome'] ?></td>
                            <td><?php echo $value['numero'] ?></td>
                            <td><?php echo $value['bairro'] ?></td>
                            <td class="actions">
                                <a class="btn btn-success btn-xs" href="?pg=visualizar-cliente&id=<?php echo $value['id']; ?>">Regarder</a>
                                <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
                                    <a class="btn btn-warning btn-xs" href="?pg=editar-cliente&id=<?php echo $value['id']; ?> ">Editer</a>
                                    <a onclick="return window.confirm('Voulez-vous vraiment supprimer ce client(e) ?');" class="btn btn-danger btn-xs" href="?pg=cliente&deletar=<?php echo $value['id']; ?>">Effacer</a>
                                <?php endif; ?>
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