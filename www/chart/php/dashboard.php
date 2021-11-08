<?php
require_once('../../classes/connect.php');
$db = connect('../../pharmacie.db');

// ====================================REFRECH DATA===========================
$fetch_month = $db->prepare("SELECT * FROM tb_ventes WHERE states = 1");
$fetch_month->execute();
$fetch_month = $fetch_month->fetchAll();

if ($fetch_month != []) {
    $month = (array_unique(array_column($fetch_month, 'mois')));
    foreach ($month as $value) {
        $fetch_benefice = $db->prepare("SELECT * FROM tb_ventes WHERE mois = '$value' AND states = 1");
        $fetch_benefice->execute();
        $fetch_benefice = $fetch_benefice->fetchAll();
        $benefice = array_sum(array_column($fetch_benefice, 'benefice'));
        $c_a = array_sum(array_column($fetch_benefice, 'prix'));
        $an = implode(array_unique(array_column($fetch_benefice, 'an')));
        $mois = $value;
        switch ($mois) {
            case ('1'):
                $mois = 'Jan';
                break;
            case ('2'):
                $mois = 'Fev';
                break;
            case ('3'):
                $mois = 'Mar';
                break;
            case ('4'):
                $mois = 'Avr';
                break;
            case ('5'):
                $mois = 'Mai';
                break;
            case ('6'):
                $mois = 'Jui';
                break;
            case ('7'):
                $mois = 'Jul';
                break;
            case ('8'):
                $mois = 'Aou';
                break;
            case ('9'):
                $mois = 'Sep';
                break;
            case ('10'):
                $mois = 'Oct';
                break;
            case ('11'):
                $mois = 'Nov';
                break;
            case ('12'):
                $mois = 'Dec';
                break;
            default:
                $mois = '...';
                break;
        }
        $row_existe = $db->prepare("SELECT * FROM tb_rapport_finance WHERE mois = '$mois' AND an = '$an'");
        $row_existe->execute();
        $row_existe = $row_existe->fetch();
        if ($row_existe === false) {
            $insert_to_rapport = $db->prepare("INSERT INTO tb_rapport_finance VALUES (null,?,?,?,?,?,?)");
            $insert_to_rapport->execute(array($benefice, $mois, $an, $c_a, 0, 0));
        } else {
            $insert_to_rapport = $db->prepare("UPDATE tb_rapport_finance SET benefice = ? WHERE mois = '$mois' AND an = '$an'");
            $benefice_new = $benefice + $row_existe['benefice'];
            $insert_to_rapport->execute(array($benefice_new));
            $insert_to_rapport = $db->prepare("UPDATE tb_rapport_finance SET ca = ? WHERE mois = '$mois' AND an = '$an'");
            $c_a_new = $c_a + $row_existe['ca'];
            $insert_to_rapport->execute(array($c_a_new));
        }
    }

    $update_states = $db->prepare("UPDATE tb_ventes SET states = 0 WHERE states = 1");
    $update_states->execute();
}
if (isset($_GET['invoice_redir'])) {
    header('location: ../../invoices.php');
} else {
    header('location: ../dashboard.php');
}

// ====================================REFRECH DATA===========================
