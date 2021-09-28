<?php
include '../classes/connect.php';
$db = connect('../pharmacie.db');

if (isset($_POST['acao'])) {
    $nom = $_POST['name'];
  

    $sql = $db->prepare("INSERT INTO tb_categorie (nom) VALUES (:nom)");
    $sql->bindValue(':nom', $nom);
    $sql->execute();

    $success = 1;
    header("location: ../main.php?pg=add-categorie&err=$success");
}
?>