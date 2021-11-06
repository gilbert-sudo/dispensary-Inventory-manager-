<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');
$date = date('m/d/y');
$day = date('d');
$month = date('m');
$year = date('y');
if (isset($_POST['acao'])) {

    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        $sql = $db->prepare("SELECT id FROM tb_clientes WHERE numero = '$numero'");
        $sql->execute();
        $response = $sql->fetch();
        if ($response['id'] != null) {
            $errMess = "$numero a déjà été utiliser par un client(e)❌";
            header("location: ../main.php?pg=adicionar-cliente&err=1&typeMess=danger&errMess=$errMess");
        } else {


            $nome = $_POST['nome'];
            $dataNascimento = $_POST['dataNascimento'];
            $bairro = $_POST['bairro'];
            if (empty($_POST['cpf'])) {
                $cpf = 'indéfinie';
            } else {
                $cpf = $_POST['cpf'];
            }
            if (empty($_POST['endereco'])) {
                $endereco = 'indéfinie';
            } else {
                $endereco = $_POST['endereco'];
            }
            if (empty($_POST['telefone'])) {
                $telefone = 'indéfinie';
            } else {
                $telefone = $_POST['telefone'];
            }
            if (empty($_POST['celular'])) {
                $celular = 'indéfinie';
            } else {
                $celular = $_POST['celular'];
            }
            if (empty($_POST['email'])) {
                $email = 'indéfinie';
            } else {
                $email = $_POST['email'];
            }


            $sql = $db->prepare("INSERT INTO tb_clientes (cpf ,nome ,dataNascimento ,endereco ,numero ,bairro ,telefone ,celular ,email ,insciption_date ,mois ,an ,day) VALUES (:cpf ,:nome ,:dataNascimento ,:endereco ,:numero ,:bairro ,:telefone ,:celular ,:email ,:insciption_date ,:mois ,:an ,:day)");
            $sql->bindValue(':cpf', $cpf);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':dataNascimento', $dataNascimento);
            $sql->bindValue(':endereco', $endereco);
            $sql->bindValue(':numero', $numero);
            $sql->bindValue(':bairro', $bairro);
            $sql->bindValue(':telefone', $telefone);
            $sql->bindValue(':celular', $celular);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':insciption_date', $date);
            $sql->bindValue(':mois', $month);
            $sql->bindValue(':an', $year);
            $sql->bindValue(':day', $day);
            $sql->execute();
            $success = 1;
            $errMess = "$nome a été bien ajouté en tant que client(e)✅";
            header("location: ../main.php?pg=adicionar-cliente&err=$success&typeMess=success&errMess=$errMess");
        }
    }
}
