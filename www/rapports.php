<?php
require_once('classes/Mysql.php');

$result = $db->prepare("SELECT * FROM tb_rapport");
$result->execute();
$resul = $result->fetchAll();

foreach ($resul as $res) {
    $benefice[] = $res['benefice'];
}
var_dump($benefice);