<?php
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');
session_start();
$numRows = 0;
$numRows1 = 0;

$code = $_POST['clientNum'];
$numero = $_POST['clientNum'];
$nome = $_POST['clientName'];
$telefone = $_POST['clientPhone'];
$email = $_POST['clientMail'];
$sql = "SELECT * FROM tb_clientes where numero = :code";
$result = $db->prepare($sql);
$result->bindValue(':code', $code);
$result->execute();
while ($row = $result->fetch(SQLITE3_ASSOC)) {
    ++$numRows1;
}
$info = $result->fetch(SQLITE3_ASSOC);
if ($numRows1 == 1) {
    $errMess = "Erreur: $code existe a été déja utilisé pour un autre client 📛";
    header("location: ../user.php?errMess=$errMess&typeMess=danger&nom=$nome&num=$code&tel=$telefone&email=$email");
} else {
    if (isset($_POST['enregistrer'])) {
        
        $cpf = 'non définie';
        $dataNascimento = 'non définie';
        $endereco = 'non définie';
        $bairro = 'non définie';
        $celular = 'non définie';
        
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
        $errMess = "$nome a bien été enregistrer en tant que client ✅";
        header("location: ../user.php?errMess=$errMess&typeMess=success");
    }
}
