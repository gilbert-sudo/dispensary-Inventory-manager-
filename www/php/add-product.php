<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');

        if (isset($_POST['acao'])) {
            $descricao = $_POST['descricao'];
            $codInterno = $_POST['codInterno'];
            $codBarras = ' ';
            $fornecedor = $_POST['fornecedor'];
            $custo = $_POST['custo'];
            $venda = $_POST['venda'];
            $quantidade = $_POST['quantidade'];
            $principio = $_POST['principio'];

            $sql = $db->prepare("INSERT INTO tb_produtos (descricao, codInterno, codBarras, fornecedor, custo, venda, principio, quantidade) VALUES (:descricao, :codInterno, :codBarras, :fornecedor, :custo, :venda, :principio, :quantidade)");
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':codInterno', $codInterno);
            $sql->bindValue(':codBarras', $codBarras);
            $sql->bindValue(':fornecedor', $fornecedor);
            $sql->bindValue(':custo', $custo);
            $sql->bindValue(':venda', $venda);
            $sql->bindValue(':principio', $principio);
            $sql->bindValue(':quantidade', $quantidade);
            $sql->execute();


            $success = 1;
            header("location: ../main.php?pg=adicionar-produto&err=$success");
        }
        ?>
