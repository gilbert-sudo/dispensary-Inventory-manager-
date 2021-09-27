<?php
require_once('classes/Mysql.php');

$result = $db->prepare("SELECT * FROM tb_clientes");
$result->execute();
echo json_encode($result->fetchAll());

