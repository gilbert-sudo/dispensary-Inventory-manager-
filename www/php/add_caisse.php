<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');

            if (isset($_POST['acao'])) {
                $nome = $_POST['nome'];
                $cargo = $_POST['cargo'];
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];

                $sql = $db->prepare("INSERT INTO tb_caisse (nome2, usuario2, senha2, cargo2) VALUES (:nome2 ,:usuario2 ,:senha2 ,:cargo2)");
                $sql->bindValue(':nome2', $nome);
                $sql->bindValue(':usuario2', $usuario);
                $sql->bindValue(':senha2', $senha);
                $sql->bindValue(':cargo2', $cargo);
                $sql->execute();

                $success = 1;
                $errMess = "$nome a été bien ajouté en tant que caissier✅";
                header("location: ../main.php?pg=adicionar-caisse&err=$success&typeMess=success&errMess=$errMess");
            }
            ?>


