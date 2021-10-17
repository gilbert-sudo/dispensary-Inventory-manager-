<?php
include '../classes/connect.php';
$db_2 = connect2('../programmed-add.db');

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];

    $db_2->exec("DELETE FROM `add_product` WHERE numero = $id");

    $db = connect('../pharmacie.db');
    $new_quant = $_GET['quantity'];
    $old_quant = $_GET['old_quant'];
    $quant = $old_quant - $new_quant;
    $update_stock = $db->prepare("UPDATE tb_produtos SET codBarras = :codBarras, quantidade = :quantidade WHERE id = $id");
    $update_stock->bindValue(':codBarras', 0);
    $update_stock->bindValue(':quantidade', $quant);
    $update_stock->execute();
    header("location: ../main.php?pg=visualizar-produto&id=$id");
}
