<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');

        if (isset($_POST['acao'])) {
            $descricao1 = $_POST['descricao'];
            $descricao = str_replace("'", "", $descricao1);
            $codInterno = $_POST['codInterno'];
            $codBarras = ' ';
            $fornecedor = $_POST['fornecedor'];
            if ($_POST['custo'] == 'false') {
                $custo = $_POST['venda'];
            }else {
                $custo = $_POST['custo'];
            }
            $venda = $_POST['venda'];
            $quantidade = $_POST['quantidade'];
            $principio = $_POST['principio'];
            $benef = $venda-$custo;
            $numRows1 = 0;

            $code = $codInterno;
            $sql = "SELECT * FROM tb_produtos where codInterno = :code";
            $result = $db->prepare($sql);
            $result->bindValue(':code', $code);
            $result->execute();
            while ($row = $result->fetch(SQLITE3_ASSOC)) {
                ++$numRows1;
            }
            $info = $result->fetch(SQLITE3_ASSOC);
            if ($numRows1 == 1) {
                $errMess = "Erreur: $code existe a été déja utilisé pour un autre produit 📛";
                header("location: ../main.php?pg=adicionar-produto&err=1&errMess=$errMess&typeMess=danger&num=$code");
            }else {

                $sql = $db->prepare("INSERT INTO tb_produtos (descricao, codInterno, codBarras, fornecedor, custo, venda, principio, quantidade, benefice) VALUES (:descricao, :codInterno, :codBarras, :fornecedor, :custo, :venda, :principio, :quantidade, :benef)");
                $sql->bindValue(':descricao', $descricao);
                $sql->bindValue(':codInterno', $codInterno);
                $sql->bindValue(':codBarras', $codBarras);
                $sql->bindValue(':fornecedor', $fornecedor);
                $sql->bindValue(':custo', $custo);
                $sql->bindValue(':venda', $venda);
                $sql->bindValue(':principio', $principio);
                $sql->bindValue(':quantidade', $quantidade);
                $sql->bindValue(':benef', $benef);
                $sql->execute();
    
    
                $success = 1;
                $errMess = "Le produit a été bien ajouté ✅";
                header("location: ../main.php?pg=adicionar-produto&err=$success&typeMess=success&errMess=$errMess");
            }

       
        }
