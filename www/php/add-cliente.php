<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');
if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    if (empty($_POST['cpf'])) {$cpf = 'indéfinie';} else {$cpf = $_POST['cpf'];}
    if (empty($_POST['endereco'])) {$endereco = 'indéfinie';} else {$endereco = $_POST['endereco'];}
    if (empty($_POST['telefone'])) {$telefone = 'indéfinie';} else {$telefone = $_POST['telefone'];}
    if (empty($_POST['celular'])) {$celular = 'indéfinie';} else {$celular = $_POST['celular'];}
    if (empty($_POST['email'])) {$email = 'indéfinie';} else {$email = $_POST['email'];}
    

    $sql = $db->prepare("INSERT INTO tb_clientes (cpf ,nome ,dataNascimento ,endereco ,numero ,bairro ,telefone ,celular ,email) VALUES (:cpf ,:nome ,:dataNascimento ,:endereco ,:numero ,:bairro ,:telefone ,:celular ,:email)");
    $sql->bindValue(':cpf', $cpf);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':dataNascimento', $dataNascimento);
    $sql->bindValue(':endereco', $endereco);
    $sql->bindValue(':numero', $numero);
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':celular', $celular);
    $sql->bindValue(':email', $email);
    $sql->execute();
    $success = 1;
    $errMess = "$nome a été bien ajouté en tant que client(e)✅";
    header("location: ../main.php?pg=adicionar-cliente&err=$success&typeMess=success&errMess=$errMess");
}

?>