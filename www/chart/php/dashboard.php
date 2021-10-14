<?php
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');

// ====================================REFRECH DATA===========================
$fetch_benefice = $db->prepare("SELECT * FROM tb_ventes WHERE states = 1");
$fetch_benefice->execute();
$fetch_benefice = $fetch_benefice->fetchAll();
if ($fetch_benefice != []) {
    $benefice = array_sum(array_column($fetch_benefice, 'benefice'));
    $an = implode(array_unique(array_column($fetch_benefice, 'an')));
    $mois = implode(array_unique(array_column($fetch_benefice, 'mois')));

    switch ($mois) {
        case ('1'):
            $mois = 'JAN';
            break;
        case ('2'):
            $mois = 'FEV';
            break;
        case ('3'):
            $mois = 'MAR';
            break;
        case ('4'):
            $mois = 'AVR';
            break;
        case ('5'):
            $mois = 'MAI';
            break;
        case ('6'):
            $mois = 'JUI';
            break;
        case ('7'):
            $mois = 'JUL';
            break;
        case ('8'):
            $mois = 'AOU';
            break;
        case ('9'):
            $mois = 'SEP';
            break;
        case ('10'):
            $mois = 'OCT';
            break;
        case ('11'):
            $mois = 'NOV';
            break;
        case ('12'):
            $mois = 'DEC';
            break;
        default:
            $mois = '...';
            break;
    }
    $row_existe = $db->prepare("SELECT * FROM tb_rapport_finance WHERE mois = '$mois' AND an = '$an'");
    $row_existe->execute();
    $row_existe = $row_existe->fetch();
    if ($row_existe === false) {
        $insert_to_rapport = $db->prepare("INSERT INTO tb_rapport_finance VALUES (null,?,?,?)");
        $insert_to_rapport->execute(array($benefice, $mois, $an));
    } else {
        $insert_to_rapport = $db->prepare("UPDATE tb_rapport_finance SET benefice = ? WHERE mois = '$mois' AND an = '$an'");
        $benefice_new = $benefice + $row_existe['benefice'];
        $insert_to_rapport->execute(array($benefice_new));
    }
    $update_states = $db->prepare("UPDATE tb_ventes SET states = 0 WHERE states = 1");
    $update_states->execute();
}
header('location: ../dashboard.php');
// ====================================REFRECH DATA===========================

