<?php
include '../classes/connect.php';
// UPDATE DATABASE
$db = connect2('../programmed-add.db');
$req = $db->prepare("SELECT * FROM add_product");
$req->execute();
$result = $req->fetchAll();
foreach ($result as $result) {
    $numero = $result['numero'];
    $add_qtt = $result['quantity'];

    $db_2 = connect('../pharmacie.db');
    $req = $db_2->prepare("SELECT * FROM tb_produtos WHERE id = ?");
    $req->execute(array($numero));
    $product = $req->fetch();

    $new_quant = $add_qtt;
    $old_quant = $product['quantidade'];

    $quant = $new_quant + $old_quant;
    $update_stock = $db_2->prepare("UPDATE tb_produtos SET quantidade = ? WHERE id = $numero");
    $update_stock->execute(array($quant));
}

$sql = $db->query('DELETE FROM `add_product`');  
$errMess = "Vos produits ont été tous mis à jour!";
header("location: ../main.php?pg=pro-add&err=1&errMess=$errMess&typeMess=success&exec=1");

