<?php
require_once('classes/Mysql.php');

$result = $db->prepare("SELECT * FROM tb_produtos");
$result->execute();
echo json_encode($result->fetchAll());

