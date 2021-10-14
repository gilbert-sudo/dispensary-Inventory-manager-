<?php
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');
session_start();
$numRows = 0;
$numRows1 = 0;

$code = $_POST['clientNum'];
$numero = $_POST['clientNum'];
$nome = $_POST['clientName'];
$bairro = $_POST['clientMail'];
$dataNascimento = $_POST['clientPhone'];

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
    header("location: ../user.php?errMess=$errMess&typeMess=danger");
} else {
    if (isset($_POST['enregistrer'])) {
        
        $cpf = 'non définie';
        $endereco = 'non définie';
        $telefone = 'non définie';
        $celular = 'non définie';
        $email = 'non définie';
        $month_date = date('m');
        $year_date = date('y');
        $insciption_date = date('m/d/y');
        
        $sql = $db->prepare("INSERT INTO tb_clientes (cpf ,nome ,dataNascimento ,endereco ,numero ,bairro ,telefone ,celular ,email ,insciption_date, mois, an) VALUES (:cpf ,:nome ,:dataNascimento ,:endereco ,:numero ,:bairro ,:telefone ,:celular ,:email ,:insciption_date ,:month_date ,:year_date)");
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':dataNascimento', $dataNascimento);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':numero', $numero);
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':celular', $celular);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':insciption_date', $insciption_date);
        $sql->bindValue(':month_date', $month_date);
        $sql->bindValue(':year_date', $year_date);
        $sql->execute();
        $errMess = "$nome a bien été enregistrer en tant que client ✅";
        header("location: ../user.php?errMess=$errMess&typeMess=success");
    }
}
