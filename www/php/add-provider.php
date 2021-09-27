<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');

if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $cnpj = $_POST['cpf'];
    $inscricao = $_POST['inscricao'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $uf = $_POST['uf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = $db->prepare("INSERT INTO tb_fornecedores (nome, cnpj, inscricao, endereco, numero, bairro, cidade, cep, uf, telefone, email) VALUES (:nome, :cnpj, :inscricao, :endereco, :numero, :bairro, :cidade, :cep, :uf, :telefone, :email)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':cidade', $cidade);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':uf', $uf);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':cnpj', $cnpj);
    $sql->bindValue(':inscricao', $inscricao);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':telefone', $telefone);
    $sql->execute();

    $success = 1;
    header("location: ../main.php?pg=adicionar-fornecedor&err=$success");
}
?>