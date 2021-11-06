<?php
include ('classes/Mysql.php');
if (isset( $_GET['deletar'] )) {
    $id = (int)$_GET['deletar'];

    $db->exec( "DELETE FROM `tb_fornecedores` WHERE id = $id" );
}
if (isset($_POST['enregistrer'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $cnpj = $_POST['cpf'];
    $inscricao = $_POST['inscricao'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = "non définie";
    $cidade = $_POST['cidade'];
    $cep = "non définie";
    $uf = $_POST['uf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = $db->prepare("UPDATE tb_fornecedores SET nome = :nome, cnpj = :cnpj, inscricao = :inscricao, endereco = endereco, numero = :numero, bairro = :bairro, cidade = :cidade, cep = :cep, uf = :uf, telefone = :telefone, email = :email  WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->bindValue(':inscricao', $inscricao);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':uf', $uf);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();
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
            <a class="btn btn-default" href="?pg=fornecedores"><i class="fa fa-refresh"></i> Actualiser</a>
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
                        <a class="btn btn-warning btn-xs" href="?pg=editar-fornecedor&id=<?php echo $value['id']; ?> " style="background-color: white;" >Editer</a>
                        <a class="btn btn-danger btn-xs" onclick="return window.confirm('Voulez-vous vraiment supprimer ce fournisseur ?');" href="?pg=fornecedores&deletar=<?php echo $value['id']; ?>">Effacer</a>
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
